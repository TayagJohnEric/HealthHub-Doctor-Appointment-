<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Dashboard </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <link rel="stylesheet"  href="{{ asset('css/patient/patient_dashboard.css') }}">
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
    justify-content: flex-start;
    gap: 40px; /* Reduced gap to make cards closer */
    flex-wrap: wrap;
    margin-top: 20px;
}

.card {
    background-color: #ffffff;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 15px 20px; /* Further reduced padding */
    flex: 1;
    min-width: 250px;
    max-width: 300px;
    margin-bottom: 10px;
    height: 150px;
}

.card .card-icon {
    display: flex;
    align-items: center;
    gap: 10px; /* Reduced space between icon and h3 */
}

.card .card-icon i {
    font-size: 28px; /* Increased size for better visibility */
    color: #31ad6b;
}

.card h3 {
    margin: 0;
    font-size: 40px; /* Adjusted font size */
    color: #48495e;
}

.card p {
    margin: 8px 0 0;
    font-size: 18px;
    color: rgb(151, 151, 151);
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
    <a href="{{route('patient.settings')}}" method="get"><i class="fas fa-sliders-h"></i> Settings</a>
  </div>
  
  <!-- Dashboard -->
  <div class="dashboard">
    <h1>Patient Dashboard</h1>

    <div class="profile-card">
      <img src="https://via.placeholder.com/50" alt="User Profile">
      <div class="profile-user">
          <h3>{{ Auth::guard('patient')->user()->name }}</h3>
          <p>Patient</p>
      </div>
  </div>

    <!-- Cards with Icons -->
    <div class="card-container">
      <div class="card">
        <div class="card-icon">
          <i class="fas fa-user-md"></i> <!-- Doctor Icon -->
          <h3>{{$doctor->count()}}</h3>
        </div>
        <p>All Doctors</p>
      </div>
     
      <div class="card">
        <div class="card-icon">
          <i class="fas fa-calendar-day"></i> <!-- Today's Sessions Icon -->
          <h3>{{$schedule->count()}}</h3>
        </div>
        <p>Today's Sessions</p>
      </div>
    </div>
  </div>
</body>
</html>