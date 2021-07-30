<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Reservation extends Model
{
    protected $fillable = [
        'pain_type_id',
        'patient_id',
        'doctor_id',
        'appointment',
        'status',
        'refuse_reason_doctor',
        'refuse_reason',
        'suitable_date'
    ];

    public function setPatientId()
    {
    	$this->attributes['patient_id'] = Auth::id();
    }

    public function doctor()
    {
    	return $this->belongsTo('App\User','doctor_id');
    }
    public function patient()
    {
    	return $this->belongsTo('App\User','patient_id');
    }
    public function pain_type()
    {
    	return $this->belongsTo('App\Model\PainType');
    }

}
