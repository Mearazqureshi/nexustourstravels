<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class BookPackage extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'package_id','user_id','source_city','departure_city','contact_no','no_of_person','total','journey_date','status','payment_status'
    ];


    public function package()
    {
        return $this->belongsTo('App\Package');
    }

}
