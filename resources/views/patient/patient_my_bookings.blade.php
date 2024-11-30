<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Dashboard Template</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <link rel="stylesheet" href="{{ asset('css/patient/patient_my_bookings.css') }}">
  <style>
    body {
    margin: 0;
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: row;
    background-color: #fafeff;
}

/* Sidebar Styling */
.sidebar {
    width: 250px;
    height: 100vh;
    background-color: rgba(255, 255, 255, 0.8); /* Transparent sidebar */
    color: #50516D;
    padding-top: 20px;
    position: fixed;
    box-shadow: 2px 0 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
    z-index: 3;
}

.sidebar a {
    display: block;
    padding: 15px;
    color: #41425d;
    text-decoration: none;
    margin-bottom: 10px;
    margin-top: 15px;
    border-radius: 20px;
    padding-left: 40px;
    transition: background-color 0.1s ease, color 0.1s ease;
}

.sidebar .logo img {
    width: 150px;
    height: auto;
    margin-bottom: 20px;
    padding-left: 40px;
}

.sidebar i {
    margin-right: 8px;
}

.sidebar a:hover {
    background-color: #31ad6b;
    color: white;
}

/* Dashboard Styling */
.content {
    margin-left: 250px; /* Same as sidebar width */
    margin-top: 70px;
    padding: 20px;
    width: calc(100% - 250px);

}
h2{
    text-align: center;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: white;
    padding: 30px 0;
}

/* Change the text color of Scheduled Sessions title on the dashboard */
.scheduled-sessions-title {
    color: rgb(210, 209, 209);
}


/* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #ffffff;
    font-size: 12px;
}

.fl-table thead th {
    color: #0e0e0e;
    background: #ffffff;
    border-bottom: 4px solid  #46a588;;
    
}


.fl-table thead th:nth-child(odd) {
    color: #141414;
    background: #ffffff;
    border-bottom: 4px solid  #46a588;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

/* Container for Add New button */
.table-top {
    display: flex;
    justify-content: flex-end;
    margin: 0 70px 10px;
}

/* Add New button styling */
.add-new-button {
    padding: 10px 20px;
    font-size: 14px;
    background-color: #46a588; /* Choose a color for the button */
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
}

/* Add New button hover effect */
.add-new-button:hover {
    background-color: #369874; /* Slightly darker shade on hover */
}

.buttons-container button{
   
    margin-right:20px;

}

.buttons-container button {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    font-size: 12px;
    cursor: pointer;
    margin-right: 10px;
    color: white;
}

/* Style for the "Edit" button */
.buttons-container button:nth-child(1) {
    background-color: #4CAF50; /* Green */
}

/* Style for the "View" button */
.buttons-container button:nth-child(2) {
    background-color: #2196F3; /* Blue */
}

/* Style for the "Remove" button */
.buttons-container button:nth-child(3) {
    background-color: #f44336; /* Red */
}

/* Hover effect for buttons */
.buttons-container button:hover {
    opacity: 0.8;
}

.profile-card {
    position: absolute;
    top: 20px;
    right: 20px;
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 5px;
    width: 120px;
    text-align: center;
    display: flex;
    gap: 4px;
    cursor: pointer;
}

.profile-user {
    padding-top: 15px;
}

.profile-card img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 5px;
}

.profile-card h3 {
    margin: 0;
    font-size: 13px;
    color: #333;
}

.profile-card p {
    margin: 0;
    font-size: 11px;
    color: #666;
}
/* Responsive */

/* Responsive Styles */
@media (max-width: 768px) {
    .dashboard {
        margin-left: 0;
        width: 100%;
        padding: 10px;
    }
    .card-container {
        flex-direction: column;
        gap: 10px;
    }
    .card {
        max-width: 100%;
    }
}

@media (max-width: 480px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        padding: 10px;
        text-align: center;
    }
    .sidebar a {
        padding: 10px;
        display: inline-block;
        margin: 5px;
    }
    .dashboard {
        padding: 10px;
    }
    .card {
        padding: 15px;
    }
}

  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <div class="logo">
        <img src="{{ asset('images/logo1.png') }}" alt="HealthHub Logo" style="width: 150px; height: auto; max-height: 80px;">
    </div>
    <a href="{{route('patient.dashboard')}}" method="get"><i class="fas fa-home"></i> Home</a>
    <a href="{{route('patient.allDoctors')}}" method="get"><i class="fas fa-user-nurse"></i> All Doctors</a><!-- Doctor icon -->
    <a href="{{route('patient.scheduledSessions')}}" method="get"><i class="fas fa-calendar-check"></i> Scheduled Sessions</a> <!-- Calendar check icon -->
    <a href="{{route('patient.myBookings')}}" method="get"><i class="fas fa-clipboard-list"></i> My Bookings</a>
    <a href="{{ route("patient.appointmentHistory")}}" method="get"><i class="fas fa-cog"></i>Appointment History</a>
    <a href="{{route('patient.settings')}}" method="get"><i class="fas fa-sliders-h"></i> Settings</a>
  </div>

  <div class="profile-card">
    <img src="https://via.placeholder.com/50" alt="User Profile">
    <div class="profile-user">
        <h3>{{ Auth::guard('patient')->user()->name }}</h3>
        <p>Patient</p>
    </div>
</div>
  
  
  <!-- Dashboard -->
  <div class="content">
    <div class="table-top">
        <h1 class="scheduled-sessions-title">Your Bookings</h1>
    </div>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Session Title</th>
                    <th>Doctor Name</th>
                    <th>Scheeduled Date</th>
                    <th>Event</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->schedule->title ?? 'N/A' }}</td>
                    <td>{{ $appointment->doctor->name ?? 'N/A' }}</td>
                    <td>{{ $appointment->schedule->schedule_date ?? 'N/A' }}</td>
                    <td>
                        <div class="buttons-container">
                            <form action="{{ route('patient.booking.destroy', $appointment->id) }}" method="POST" style="display:inline;"> 
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="remove-button">Cancel Booking</button> 
                            </form>
                            
                        </td>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>