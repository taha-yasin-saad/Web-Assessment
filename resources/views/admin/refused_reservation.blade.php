@extends('layouts.admin')
@section('content')
 <div class="container-fluid">
  <div class="row bg-title">
   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">
     Refused reservation
    </h4> 
   </div>
   <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
<!--      <li><a href="{{url('admin')}}">@lang('admin.dashboard')</a></li>
 -->     <li class="active">
       Refused reservation
     </li>
    </ol>
   </div>
  </div>
  <div class="row">
   <div class="col-sm-12">
    <div class="white-box">
     <div class="add-product">
      <h3>
       Refused reservation
      </h3>
      @if (session('success'))
       <div class="alert alert-success">
        {{ session('success') }}
       </div>
      @endif
      @if (count($errors) > 0)
       <div class="alert alert-danger">
        <ul>
         @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
         @endforeach
        </ul>
       </div>
      @endif
      <form class="form-horizontal" action="{{url('update_refused_reservation/'.$reservation->id)}}" method="post"  enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
          <label class="col-sm-2 control-label">Patient Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$reservation->patient->f_name}} {{$reservation->patient->l_name}}" disabled="" />
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Pain Type</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$reservation->pain_type->pain_type}}" disabled="" />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Doctor Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$reservation->doctor->f_name}} {{$reservation->doctor->l_name}}" disabled="" />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Appointment</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$reservation->appointment}}" disabled="" />
          </div>
        </div>
        @if(Auth::user()->role == 1)
        <div class="form-group">
          <label class="col-sm-2 control-label">Reason</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="refuse_reason_doctor" value="{{old('refuse_reason_doctor')}}"  />
          </div>
        </div>
        @else
        <div class="form-group">
          <label class="col-sm-2 control-label">Refuse Reason</label>
          <div class="col-sm-10">
           <select class="form-control select2"  name="refuse_reason" required>
                  <option disabled="" selected="">Select Reason</option>
                  <option value="1">Change the doctor</option>
                  <option value="2">Reschedule</option>
                  
              </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Suitable date</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" value="{{old('suitable_date',$reservation->appointment)}}" name="suitable_date" required/>
          </div>
        </div>
        @endif
        <div class="form-actions m-t-40">
          <button type="submit" class="btn btn-danger"> <i class="fa fa-check"></i> Save</button>
        </div>     
      </form>
     </div>
    </div>
   </div>
  </div>
 </div>
@endsection