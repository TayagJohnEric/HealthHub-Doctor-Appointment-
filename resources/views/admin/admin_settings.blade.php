<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Dashboard Template</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <link rel="stylesheet" href="{{ asset('css/doctor/doctor_settings.css') }}">
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
    background-color: rgba(20, 116, 84, 0.8); /* Transparent sidebar */
    color: #fff;
    padding-top: 20px;
    position: fixed;
    box-shadow: 2px 0 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
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

.sidebar i{

    margin-right: 8px;
}

.sidebar a:hover {
    background-color: rgba(48, 117, 94, 0.8); /* Slightly transparent on hover */
}

/* Dashboard Styling */
.dashboard {
    margin-left: 250px;
    padding: 20px;
    width: calc(100% - 250px);
    background-color: #fafeff;
}

.dashboard h1 {
    color: rgb(202, 211, 207);
}

.card {
    display: block;
    padding: 20px;
    border: 1px solid rgb(206, 206, 206);
    border-radius: 10px;
    color: rgb(74, 74, 74);
    text-decoration: none;
    cursor: pointer;
    transition: background-color 0.2s, border-color 0.2s;
    width: 100%; /* Make sure it fills the parent */
}

.card:hover {
    background-color: #35a967; /* Light green background */
    border-color: #3f895f; /* Green border */
    color: white;
}

button {
    border: none;
    background: none;
    padding: 0;
}

/* Make the card (button) wider */
#cancel-appointment {
    display: flex;
    align-items: center;
    width: 100%; /* Make the button fill the available width */
    max-width: 400px; /* Optional: Set a maximum width if desired */
}

#cancel-appointment i {
    margin-right: 10px; /* Space between the icon and text */
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
    color: #353643;
}

.profile-card p {
    margin: 0;
    font-size: 11px;
    color: #666;
}
  

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
        <img src="{{ asset('images/logo2.png') }}" alt="HealthHub Logo" style="width: 150px; height: auto; max-height: 80px;">
    </div>
    <a href="{{route('admin.dashboard')}}" method="get"><i class="fas fa-home"></i> Dashboard</a>
        <a href="{{route('admin.doctor.index')}}" method="get"><i class="fas fa-user-md"></i> Doctors</a>
        <a href="{{route('admin.schedule.index')}}" method="get"><i class="fas fa-clock"></i> Schedule</a>
        <a href="{{route('admin.appointment.index')}}" method="get"><i class="fas fa-calendar-check"></i> Appointment</a>
        <a href="{{route('admin.patients.index')}}" method="get"><i class="fas fa-users"></i> Patients</a>
        <a href="{{ route("admin.settings")}}" method="get"><i class="fas fa-cog"></i> Settings</a>
  </div>

  <div class="profile-card">
    <img src="https://via.placeholder.com/50" alt="User Profile">
    <div class="profile-user">
        <h3>Admin</h3>
        <p>Admin</p>
    </div>
</div>
  
  <!-- Dashboard -->
  <div class="dashboard">
    <h1>Settings</h1>

    <a href="{{ route('admin.login') }}" method="get" id="cancel-appointment" class="card button">
        <i class="fas fa-sign-out-alt"></i> Log out
    </a>
</div>

</body>
</html>