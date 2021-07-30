<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PersonalRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Http\Requests\PainTypeRequest;
use App\Model\PainType;
use App\Model\Doctor;
use App\Model\Reservation;
use App\Model\Notification;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function personal_information(PersonalRequest $request)
    {
        $user = Auth::user();
        $user->update($request->all());
        if(Auth::user()->role == 2)
            return redirect('select_pain_type');
        else
            return redirect()->back()->with('success','updated successfully');
    }

    public function select_pain_type()
    {
        $query['pains'] = PainType::all();
        return view('admin/pain_types',$query);
    }

    public function reserve(PainTypeRequest $request)
    {
        $data = $request->all();
        $data['patient_id'] = Auth::id();
        Reservation::create($data);
        return redirect('reservations');
    }
    public function reservations()
    {
        if(Auth::user()->role==0)
            $query['reservations']  = $this->admin_reservation();
        elseif(Auth::user()->role==1)
            $query['reservations']  = $this->doctor_reservation();
        elseif(Auth::user()->role==2)
            $query['reservations']  = $this->patient_reservation();
        return view('admin/reservations',$query);
    }
    public function admin_reservation()
    {
        return  Reservation::where('status','!=',1)->get();
    }
    public function doctor_reservation()
    {
        return  Reservation::orderBy('id','desc')->where('doctor_id',Auth::id())->get();
    }
    public function patient_reservation()
    {
        return  Reservation::orderBy('id','desc')->where('patient_id',Auth::id())->get();
    }
    public function update_reservation(Reservation $reservation)
    {
        $query['reservation'] = $reservation;
        $query['doctors'] = Doctor::whereHas('specialists',function ($query) use($reservation) {
                         $query->where('pain_types.id', $reservation->pain_type_id);
            
        })->get();
        return view('admin/update_reservation',$query);
    }
    public function reservation_update(UpdateReservationRequest $request,Reservation $reservation)
    {
        $data = $request->all();
        $data['status'] = 1;
        $reservation->update($data);

        $not['reservation_id'] = $reservation->id;
        $not['user_id'] = $reservation->patient_id;
        $not['message'] = 'We reserve to Doctor '.$reservation->doctor->f_name . ' '. $reservation->doctor->l_name . ' in day '.$reservation->appointment;
        Notification::create($not);

        $not['reservation_id'] = $reservation->id;
        $not['user_id'] = $reservation->doctor_id;
        $not['message'] = 'you have case in '.$reservation->appointment;
        Notification::create($not);
        return redirect('reservations')->with('success','updated successfully');
    }
    public function refused_reservation(Reservation $reservation)
    {
        $query['reservation'] = $reservation;

        return view('admin/refused_reservation',$query);
    }
    public function update_refused_reservation(Request $request,Reservation $reservation)
    {
        $data = $request->all();
        if(Auth::user()->role == 2)
            $data['status'] = 2;
        else if(Auth::user()->role == 1)
            $data['status'] = 3;

        $reservation->update($data);
        return redirect('reservations')->with('success','updated successfully');

    }
    public function notifications()
    {
         Notification::where('user_id',Auth::id())->update(['is_read'=>1]);
        $query['notifications'] = Notification::where('user_id',Auth::id())->orderBy('id','desc')->get();
        return view('admin/notifications',$query);
    }
}
