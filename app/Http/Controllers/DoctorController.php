<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    
    public function index(Appointment $appointment)
    {
        // Fetch appointments for the authenticated doctor
        $appointments = Appointment::where('doctor_id', Auth::guard('doctor')->id())->with(['patient', 'schedule'])->get();
        dd($appointments);
        // Return view with the appointments data
        return view('doctor.doctor_dashboard', compact('appointment'));
    }
    

    public function store(Request $request) { 

        $request->validate([
            'name' => 'required|string|max:255', 
            'email' => 'required|email|unique:doctor,email',
            'contact_info' => 'required|string|max:15', 
            'specialities' => 'required|string|max:255', 
            'password' => 'required|string|min:3|confirmed',
        ]);


        $doctor = Doctor::create([ 'name' => $request->name,
                                   'email' => $request->email,
                                   'contact_info' => $request->contact_info, 
                                   'specialization' => $request->specialities, 
                                'password' => Hash::make($request->password),
    ]);

   return redirect()->route('admin.doctor.index')->with('success', 'Doctor created successfully.');
    }

    public function scheduleIndex() { 
        // Fetch the authenticated doctor
        $doctor = Auth::guard('doctor')->user(); // Assuming the authenticated user has a doctor relationship
          // Retrieve the schedules associated with the doctor
           $schedules = $doctor->schedules; // Return the view with the schedules
            return view('doctor.doctor_schedule_index', compact('schedules'));
}

public function myAppointments()
{
    $appointments = Appointment::where('doctor_id', Auth::guard('doctor')->id())->with(['patient', 'schedule'])->get();
    return view('doctor.doctor_appointments', compact('appointments'));
}


public function myPatients(){

    $appointments = Appointment::where('doctor_id', Auth::guard('doctor')->id())->with(['patient', 'schedule'])->get();
    return view('doctor.doctor_patients', compact('appointments'));
}

public function settings(){
    
    return view('doctor.doctor_settings');
}

public function show(Doctor $doctor) 
{ 
    return view('admin.doctor_show', compact('doctor'));
 }

 public function myAppointmentsShow(Appointment $appointment){
    
    return view('doctor.doctor_appointment_show', compact('appointment'));
}

public function myAppointmentDestroy(Appointment $appointment){
   
    $appointment->delete();
    return redirect()->route('doctor.myAppointments')->with('success', 'Doctor deleted successfully.');

 }   

 public function myScheduleShow(Schedule $schedule){
     
    return view("doctor.doctor_schedule_show", compact('schedule'));
    }

    public function myScheduleDestroy(Schedule $schedule){
   
        $schedule->delete();
        return redirect()->route('doctor.schedule.index')->with('success', 'Doctor deleted successfully.');
     }   

     public function myPatientShow(Patient $patient){
     
        return view("doctor.doctor_patient_show", compact('patient'));
        }
}