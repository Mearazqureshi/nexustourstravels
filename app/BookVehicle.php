<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class BookVehicle extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vehicle_id','no_of_days','user_id','total','hire_date','from','to','km','contact_no'
    ];


    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle');
    }

}
