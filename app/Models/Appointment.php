<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    protected $fillable = [
        'doctor_id',        // Foreign key for doctor
        'patient_id',       // Foreign key for patient
        'schedule_id',      // Foreign key for schedule
        'appointment_date', // Date of the appointment
        'status', // New field
        'status_updated_at', // New field
    ];
    
    protected $table = "appointments";

    // In a helper file or the Appointment model:
public function getStatusColor()
{
    return match ($this->status) {
        'pending' => 'white',
        'accepted' => 'green',
        'declined' => 'red',
        'completed' => 'blue',
        default => 'gray', // Default color for unknown statuses
    };
}


    public function doctor()
{
    return $this->belongsTo(Doctor::class);
}

public function patient()
{
    return $this->belongsTo(Patient::class);
}

public function schedule()
{
    return $this->belongsTo(Schedule::class);
}

}