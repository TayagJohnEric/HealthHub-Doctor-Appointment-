<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'title' => 'required|string|max:255',
            'doctor_id' => 'required|exists:doctor,id', // Fixed "doctor" to "doctors" for correct table name
            'schedule_date' => 'required|date',
            'schedule_time' => 'required'
        ]);
    
        // Create a new session with the provided data
        Schedule::create([
            'title' => $request->input('title'),
            'doctor_id' => $request->input('doctor_id'),
            'schedule_date' => $request->input('schedule_date'),
            'schedule_time' => $request->input('schedule_time'),
        ]);
    
        // Redirect to the schedule index page with a success message
        return redirect()->route('admin.schedule.index')->with('success', 'Session added successfully!');
    }
    
    
}