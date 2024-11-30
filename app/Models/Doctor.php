<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    protected $table = "doctor";

    protected $fillable = [
        'email',
        'password',
        'name',
        'contact_info',
        'specialization',
    ];

    // Relationships
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function patients()
    {
        return $this->hasManyThrough(Patient::class, Appointment::class, 'doctor_id', 'patient_id', 'id', 'patient_id');
    }

    public function schedules()
{
    return $this->hasMany(Schedule::class, 'doctor_id', 'id');
}
}