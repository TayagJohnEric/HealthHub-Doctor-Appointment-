<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Dashboard Template</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <link rel="stylesheet" href="{{ asset('css/admin/admin_dashboard.css') }}">
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
    position: relative;
    background-color: #fafeff;
}

.dashboard h1 {
    color: rgb(202, 211, 207);
}

.card-container {
    display: flex;
    justify-content: space-between;
    gap: 15px;
    flex-wrap: wrap;
    margin-top: 40px;
}

.card {
    background-color: #ffffff;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 30px;
    padding-top: 50px;
    flex: 1;
    min-width: 300px;
    max-width: 450px;
    margin-bottom: 15px;
    height: 170px;
}
.card .card-icon {
    display: flex;
    align-items: center;
    gap: 20px; /* Adjusts the space between the icon and h3 */
}

.card .card-icon i {
    font-size: 24px;
    color: #31ad6b;
}

.card h3 {
    margin: 0;
    font-size: 50px;
    color: #48495e;
}



.card p {
    margin: 10px 0;
    font-size: 20px;
    color: rgb(151, 151, 151);
}

/* Profile Card Styling */
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
    .profile-card {
        position: static;
        margin-bottom: 20px;
        width: auto;
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
    .profile-card img {
        width: 40px;
        height: 40px;
    }
    .card {
        padding: 20px;
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
    </div>
      
  
  <!-- Dashboard -->
  <div class="dashboard">
    <h1>Admin Dashboard</h1>

    
    
    <!-- Profile Card -->
    <div class="profile-card">
      <img src="https://via.placeholder.com/50" alt="User Profile">
      <div class="profile-user">
        <h3>Admin</h3>
        <p>Admin</p>
      </div>
    </div>
    
    <!-- Cards with Icons -->
    <div class="card-container">
      <div class="card">
        <div class="card-icon">
          <i class="fas fa-user-md"></i>
          <h3>{{$doctors->count()}}</h3>
        </div>
        <p>Doctors</p>
      </div>
      <div class="card">
        <div class="card-icon">
          <i class="fas fa-users"></i>
          <h3>{{$patient->count()}}</h3>
        </div>
        <p>Patients</p>
      </div>
      <div class="card">
        <div class="card-icon">
          <i class="fas fa-calendar-plus"></i>
          <h3>{{$appointment->count()}}</h3>
        </div>
        <p>New Booking</p>
      </div>
      <div class="card">
        <div class="card-icon">
          <i class="fas fa-calendar-day"></i>
          <h3>{{$schedules->count()}}</h3>
        </div>
        <p>Today's Sessions</p>
      </div>
    </div>
  </div>
</body>
</html>