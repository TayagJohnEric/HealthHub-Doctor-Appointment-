<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,accepted,declined,completed',
        ]);
    
        $appointment = Appointment::findOrFail($id);
    
        $appointment->update([
            'status' => $request->status,
            'status_updated_at' => now(), // Set the timestamp for the status update
        ]);
    
        return redirect()->back()->with('success', 'Appointment status updated successfully!');
    }
    

}
