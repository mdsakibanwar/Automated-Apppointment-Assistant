<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
	protected $fillable = ['user_id','client_id','appointmentTime'];
    //
}