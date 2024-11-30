<?php

namespace App\Http\Controllers;


use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Schedule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{

    public function login(){

        return view('patient_login');
        
    }
    public function loginPatient(){

        return view('patient_login2');
        
    }

    public function patientCreate(){

       return view("register_patient");

    }

    public function patientDashboard(Doctor $doctor, Schedule $schedule){

        return view('patient.patient_dashboard', compact('doctor', 'schedule'));
    }

    public function allDoctors(){
        $doctors = Doctor::all();
        return view('patient.patient_doctor', compact("doctors"));
    }

    public function scheduledSessions(){

        $doctors = Doctor::with('schedules')->whereHas('schedules')->get();
        return view('patient.patient_scheduled_session', compact('doctors'));
    }

    public function myBookings()
{
    $appointments = Appointment::where('patient_id', Auth::guard('patient')->id())
        ->with(['schedule', 'doctor'])
        ->get();

    return view('patient.patient_my_bookings', compact('appointments'));
}

public function appointmentHistory()
{
    $patientId = Auth::guard('patient')->id();

    $appointments = Appointment::with('doctor') // Eager load the doctor relationship
                                ->where('patient_id', $patientId)
                                ->orderBy('appointment_date', 'desc')
                                ->get();

    return view('patient.patient_appointment_history', compact('appointments'));
}



    public function settings(){

        return view("patient.patient_settings");
 
     }


    public function store(Request $request)
{


    $request->validate([
        'full-name' => 'required|string|max:255',
        'email' => 'required|email|unique:patient,email',
        'phone' => 'required|string|max:255',
        'dob' => 'required|date',
        'gender' => 'required|string',
        'password' => 'required|string|confirmed',
      
    ]);

    Patient::create([
        'name' => $request->input('full-name'),
        'email' => $request->input('email'),
        'contact_info' => $request->input('phone'),
        'birth_date' => $request->input('dob'),
        'gender' => $request->input('gender'),
        'password' => Hash::make($request->input('password')),
        'description' => $request->input('discription'),
    ]);

    return redirect()->route('patient.login2');
}

public function authenticate(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Attempt to authenticate the patient
    if (Auth::guard('patient')->attempt($credentials)) {
        // Authentication passed, redirect to the patient dashboard
        return redirect()->route('patient.dashboard')->with('success', 'Login successful');
    }

    // If authentication fails, return back with an error message
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}

public function logout()
{
    Auth::guard('patient')->logout(); // Log out the doctor

    // Invalidate the session and regenerate token
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    // Clear all session data manually
    session()->flush(); 

    // Redirect to login with a success message
    return redirect()->route('patient.login')->with('success', 'You have been logged out.');

}


//From ChatGpt
public function bookAppointment(Request $request)
{
    $request->validate([
        'doctor_id' => 'required|exists:doctor,id',
        'schedule_id' => 'required|exists:schedules,id',
    ]);

    $appointment = Appointment::create([
        'doctor_id' => $request->doctor_id,
        'patient_id' => Auth::guard('patient')->id(),
        'schedule_id' => $request->schedule_id,
        'appointment_date' => now(),
        'status' => 'pending', // Default status
        'status_updated_at' => now(), // Initial status update timestamp
    ]);
    

    return redirect()->route('patient.myBookings')->with('success', 'Appointment booked successfully');
}

public function doctorShow(Doctor $doctor) {
    return view('patient.patient_doctor_show', compact('doctor'));
   }

   public function deleteAccount()
{
    // Get the authenticated patient ID
    $patientId = Auth::guard('patient')->id();

    // Find and delete the patient record
    if ($patientId) {
        Patient::where('id', $patientId)->delete();

        // Log the patient out

        // Redirect to patient login page with a success message
        return redirect()->route('patient.login')->with('status', 'Account deleted successfully.');
    }

    // If patient is not authenticated, redirect to login page
    return redirect()->route('patient.login');
}

// Display the edit form with current patient data
public function edit()
{
    // Get the authenticated patient
    $patient = Auth::guard('patient')->user();

    // Check if the patient data is available
    if (!$patient) {
        // If patient is null, redirect with an error message
        return redirect()->route('patient.login')->withErrors('Please log in to edit your profile.');
    }

    // Return the edit view with patient data
    return view('patient.patient_edit', compact('patient'));
}
// Update the authenticated patient data
public function update(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'birth_date' => 'required|date',
        'contact_info' => 'required|string|max:255',
        'gender' => 'required|string|max:10',
        'email' => 'required|email|unique:patient,email,' . Auth::guard('patient')->id(),
    ]);

    // Get the authenticated patient's ID
    $patientId = Auth::guard('patient')->id();

    // Find the patient model by ID and update it
    $patient = Patient::findOrFail($patientId);
    $patient->name = $request->input('name');
    $patient->birth_date = $request->input('birth_date');
    $patient->contact_info = $request->input('contact_info');
    $patient->gender = $request->input('gender');
    $patient->email = $request->input('email');
    $patient->save();

    // Redirect back with success message
    return redirect()->route('patient.edit')->with('status', 'Profile updated successfully.');
}

public function myBookingDestroy(Appointment $appointment)
{
    // Ensure the authenticated patient is the owner of this booking
    if ($appointment->patient_id !== Auth::guard('patient')->id()) {
        abort(403, 'Unauthorized action.');
    }
    
    $appointment->delete();
    return redirect()->route('patient.myBookings')->with('success', 'Booking canceled successfully.');
}




}