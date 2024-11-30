<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Http\Request;
use PDO;

class AdminController extends Controller

{
    public function dashboard(Patient $patient, Appointment $appointment){

        $doctors = Doctor::all();
        $schedules = Schedule::all();

        return view("admin.admin_dashboard", compact("doctors", 'schedules', 'patient', 'appointment'));
    }

    public function doctorIndex(){

        $doctors = Doctor::all();

        return view("admin.doctor_index", compact("doctors"));
    }

    public function scheduleIndex()
{
    $schedules = Schedule::with('doctor')->get();
    return view("admin.schedule_index", compact("schedules"));
}

    public function createDoctor(){

        return view("admin.doctor_create");
    }

    public function createSchedule()
{
    // Fetch all doctors
    $doctors = Doctor::all();

    // Pass the list of doctors to the view
    return view("admin.schedule_create", compact("doctors"));
}

public function appointmentIndex()
{
    $appointments = Appointment::with(['doctor', 'patient', 'schedule'])->get(); // Use eager loading

    return view('admin.admin_appointment', compact('appointments'));
}

public function patientIndex(){
     

    $patients = Patient::all();
    return view('admin.admin_patients', compact('patients'));
}

public function doctorShow(Doctor $doctor) {
     return view('admin.doctor_show', compact('doctor'));
    }

public function doctorEdit(Doctor $doctor) { 
        return view('admin.doctor_edit', compact('doctor')); 
    }

    public function doctorUpdate(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => $request->has('name') ? 'required|string|max:255' : '',
            'email' => $request->has('email') ? 'required|email|unique:doctor,email,' . $doctor->id : '',
            'contact_info' => $request->has('contact_info') ? 'required|string|max:15' : '',
            'specialization' => $request->has('specialization') ? 'required|string|max:255' : '',
        ]);
    
        // Update only the fields provided in the request
        $doctor->update($request->only(['name', 'email', 'contact_info', 'specialization']));
    
        return redirect()->route('admin.doctor.index')->with('success', 'Doctor updated successfully.');
    }


public function doctorDestroy(Doctor $doctor){
            
                $doctor->delete();
             return redirect()->route('admin.doctor.index')->with('success', 'Doctor deleted successfully.');
        
    }

public function scheduleShow(Schedule $schedule){
     
    return view("admin.schedule_show", compact('schedule'));
    }

 public function scheduleDestroy(Schedule $schedule){
   
    $schedule->delete();
    return redirect()->route('admin.schedule.index')->with('success', 'Doctor deleted successfully.');

 }   

 public function appointmentDestroy(Appointment $appointment){
   
    $appointment->delete();
    return redirect()->route('admin.appointment.index')->with('success', 'Doctor deleted successfully.');

 }   

 public function patientShow(Patient $patient){
     
    return view("admin.patients_show", compact('patient'));
    }


    public function adminLogin(){

      return view('admin_login');
    }
public function settings(){

    return view("admin.admin_settings");
}

}
