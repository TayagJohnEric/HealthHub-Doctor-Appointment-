<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor Details</title>
    <link rel="stylesheet" href="{{ asset('css/doctor/doctor_appointment_show.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <style>
        /* General Reset */
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #fcfcfc;
}

/* Sidebar Styling */
.sidebar {
    width: 250px;
    height: 100vh;
    background-color: rgba(255, 255, 255, 0.8);
    color: #50516D;
    padding-top: 20px;
    position: fixed;
    box-shadow: 2px 0 8px rgba(0, 0, 0, 0.2);
    z-index: 3;
}

.sidebar .logo img {
    width: 150px;
    height: auto;
    margin-bottom: 20px;
    padding-left: 40px;
}

.sidebar a {
    display: block;
    padding: 15px;
    color: #50516D;
    text-decoration: none;
    margin-bottom: 10px;
    border-radius: 20px;
    margin-top: 20px;
    padding-left: 40px;
}

.sidebar i {
    margin-right: 8px;
}

.sidebar a:hover {
    background-color: rgba(30, 155, 114, 0.8);
    color: white;
}


.container {

    padding-top:100px;
    margin-left:500px;
    max-width: 800px;
   
}

.img-title{

    align-items: center;
    
}

.profile-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    text-align: center;
}

.profile-content {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-top: 20px;
}

.profile-picture {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    overflow: hidden;
    
}

.profile-picture img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.profile-info {
    flex: 1;
    text-align: left;
}

.back-button a {
    text-decoration: none;
    color: #fff;
    background-color:  #34b890;
    padding: 10px 20px;
    border-radius: 4px;
    display: inline-block;
    margin-top: 20px;
}

.back-button a:hover {
    background-color:  #37b992;
}


    </style>
</head>
<body>

    <div class="sidebar">
        <div class="logo">
        <img src="{{ asset('images/logo1.png') }}" alt="HealthHub Logo" style="width: 150px; height: auto; max-height: 80px;">
        </div>
        <a href="{{ route('doctor.dashboard') }}" method="get"><i class="fas fa-home"></i> Dashboard</a>
        <a href="{{ route('doctor.myAppointments')}}" method="get"><i class="fas fa-calendar-alt"></i> My Appointments</a>
        <a href="{{ route("doctor.schedule.index")}}" method="get"><i class="fas fa-clock"></i> My Sessions</a>
        <a href="{{ route("doctor.myPatients")}}" method="get"><i class="fas fa-user-injured"></i> My Patients</a>
        <a href="{{ route("doctor.settings")}}" method="get"><i class="fas fa-cog"></i> Settings</a>
    </div>

    <div class="container">     
        <div class="profile-card">        
            <h1>Appointment Details</h1>
            <div class="profile-content">      
                <div class="profile-picture">
                    <img src="https://via.placeholder.com/150" alt="Profile Picture">
                </div>                       
                <!-- Profile Information -->
                <div class="profile-info">
                    <p><strong>Patient Name:</strong> {{ $patient->name }}</p>
                    <p><strong>Birth Date:</strong> {{ $patient->birth_date }}</p>
                    <p><strong>Contact Information:</strong> {{ $patient->contact_info}}</p>
                    <p><strong>Gender:</strong> {{ $patient->gender }}</p>
                    <p><strong>Email:</strong> {{ $patient->email }}</p>
                    
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>