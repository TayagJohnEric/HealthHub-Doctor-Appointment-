<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Patient extends Authenticatable
{
    
    protected $table = "patient";


    protected $fillable = [
        'name',
        'birth_date',
        'contact_info',
        'gender',
        'email',     
        'password',   // Newl added email field
        'description',   // Newly added description field for appointment reason
    ];

    public function appointments()
{
    return $this->hasMany(Appointment::class);
}

}