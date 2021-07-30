<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    	protected $table = 'users';

    	protected static function boot()
    	{
		parent::boot();
        		static::addGlobalScope('role', function (Builder $builder) {
            			$builder->where('role', 1);
        		});
    	}
    	public function specialists()
	{
    		return $this->belongsToMany('App\Model\PainType','doctor_specialists','doctor_id','pain_type_id');
	    
	}
}
