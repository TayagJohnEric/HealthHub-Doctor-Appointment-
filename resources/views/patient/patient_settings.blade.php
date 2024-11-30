<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Dashboard Template</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <link rel="stylesheet"  href="{{ asset('css/patient/patient_settings.css') }}">
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
    margin-left: 300px;
    margin-top: 40px;
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
    margin-top: 15px;
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
  <div class="dashboard">
    <h1>Appointment History </h1>

    <form action="{{ route('patient.deleteAccount') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?');">
      @csrf
      @method('DELETE')
      <button type="submit" id="cancel-appointment" class="card">
          <i class="fas fa-times"></i>
          <p>Delete This Account</p>
      </button>
  </form>
  

    <form action="{{ route('patient.logout') }}" method="post">
        @csrf
        <button id="cancel-appointment" class="card">
            <i class="fas fa-sign-out-alt"></i>
            <p>Log Out</p>
        </button>
    </form>

    <form action="{{ route('patient.edit') }}" method="GET">
      <button type="submit" id="cancel-appointment" class="card" >
          <i class="fas fa-edit"></i>
          <p>Edit</p>
      </button>
  </form>
  
  </div>
</body>
</html>