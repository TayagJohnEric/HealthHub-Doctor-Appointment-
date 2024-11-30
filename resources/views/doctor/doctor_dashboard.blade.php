
You sent
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Dashboard Template</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <link rel="stylesheet" href="{{ asset('css/doctor/doctor_dashboard.css') }}">
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
    background-color: #31ad6b; /* Slightly transparent on hover */
    color: white;
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
    gap: 1px; /* Decrease gap from 15px to 10px */
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
        <img src="{{ asset('images/logo1.png') }}" alt="HealthHub Logo" style="width: 150px; height: auto; max-height: 80px;">
    </div>
    <a href="{{ route('doctor.dashboard') }}" method="get"><i class="fas fa-home"></i> Dashboard</a>
    <a href="{{ route('doctor.myAppointments')}}" method="get"><i class="fas fa-calendar-alt"></i> My Appointments</a>
    <a href="{{ route("doctor.schedule.index")}}" method="get"><i class="fas fa-clock"></i> My Sessions</a>
    <a href="{{ route("doctor.myPatients")}}" method="get"><i class="fas fa-user-injured"></i> My Patients</a>
    <a href="{{ route("doctor.settings")}}" method="get"><i class="fas fa-cog"></i> Settings</a>
  </div>
  
  <!-- Dashboard -->
  <div class="dashboard"> 
    <h1>Doctor's Dashboard</h1>

    
  
    
    <!-- Profile Card -->
    <div class="profile-card">
      <img src="https://via.placeholder.com/50" alt="User Profile">
      <div class="profile-user">
          <h3>Dr. {{ Auth::guard('doctor')->user()->name }}</h3>
          <p>Doctor</p>
      </div>
  </div>
    
    <!-- Cards with Icons -->
    <div class="card-container">
      <div class="card">
        <div class="card-icon">
          <i class="fas fa-user-md"></i> <!-- Doctor Icon -->
          <h3>0</h3>
        </div>
        <p>All Doctors</p>
      </div>
      <div class="card">
        <div class="card-icon">
          <i class="fas fa-procedures"></i> <!-- Patient Icon -->
          <h3>0</h3>
        </div>
        <p>All Patients</p>
      </div>
      <div class="card">
        <div class="card-icon">
          <i class="fas fa-book-medical"></i> <!-- Booking Icon -->
          <h3>0</h3>
        </div>
        <p>New Booking</p>
      </div>
      <div class="card">
        <div class="card-icon">
            <i class="fas fa-calendar-day"></i> <!-- Today's Sessions Icon -->
            <h3>0</h3> <!-- This should work if $todaySchedules is passed properly -->
        </div>
        <p>Today's Sessions</p>
    </div>
    
    
    </div>
  </div>
</body>
</html>