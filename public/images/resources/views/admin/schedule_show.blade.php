<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <title>Doctor Profile</title>
    <style>
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
    background-color: rgba(20, 116, 84, 0.8);
    color: #fff;
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
    color: white;
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
    background-color: rgba(48, 117, 94, 0.8);
}


.container {

    padding-top:100px;
    margin-left:400px;
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
    text-align: center;
}

.back-button a {
    text-decoration: none;
    color: #fff;
    background-color:  #46a588;
    padding: 10px 20px;
    border-radius: 4px;
    display: inline-block;
    margin-top: 20px;
}

.back-button a:hover {
    background-color:  #46a588;
}

    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/logo2.png') }}" alt="HealthHub Logo" style="width: 150px; height: auto; max-height: 80px;">
        </div>
        <a href="{{route('admin.dashboard')}}" method="get"><i class="fas fa-home"></i> Dashboard</a>
        <a href="{{route('admin.doctor.index')}}" method="get"><i class="fas fa-user-md"></i> Doctors</a>
        <a href="{{route('admin.schedule.index')}}" method="get"><i class="fas fa-clock"></i> Schedule</a>
        <a href="{{route('admin.appointment.index')}}" method="get"><i class="fas fa-calendar-check"></i> Appointment</a>
        <a href="{{route('admin.patients.index')}}" method="get"><i class="fas fa-users"></i> Patients</a>
    </div>
      
   

    <div class="container">     
        <div class="profile-card">        
            <h1>Schedule Details</h1>
            <div class="profile-content">                  
                <!-- Profile Information -->
                <div class="profile-info">
                    <p><strong>Doctor Name:</strong> {{ $schedule->doctor->name }}</p>
                    <p><strong>Title:</strong> {{ $schedule->title }}</p>
                    <p><strong>Schedule Date:</strong> {{ $schedule->schedule_date }}</p>
                    <p><strong>Schedule Time:</strong> {{ $schedule->schedule_time }}</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>