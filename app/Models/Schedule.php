<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    
    
    protected $table = "schedules";

    protected $fillable = [
        'doctor_id',
        'title',
        'schedule_date',
        'schedule_time',  
    ];
    
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}