<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Schedule</title>
    <link rel="stylesheet" href="{{ asset('css/doctor/doctor_patients.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <style>
        body {
    margin: 0;
    font-family: Arial, sans-serif;
    display: flex;
    background-color: #fafeff;
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
    background-color: rgba(0, 170, 113, 0.8);
    color: white;
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


/* Content Section */
.content {
    margin-left: 250px; /* Same as sidebar width */
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

.view-button {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    font-size: 12px;
    cursor: pointer;
    margin-right: 10px;
    color: white;
}

/* Style for the "Edit" button */
.view-button {
    background-color: #4CAF50; /* Green */
}

/* Hover effect for buttons */
.buttons-container button:hover {
    opacity: 0.8;
}

.title{

    color:rgb(172, 172, 172);
    margin-left: 65px;
    margin-bottom: 40px;
}
/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    }
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
    <div class="profile-card">
        <img src="https://via.placeholder.com/50" alt="User Profile">
        <div class="profile-user">
            <h3>Dr. {{ Auth::guard('doctor')->user()->name }}</h3>
            <p>Doctor</p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="content">
        <h2>Responsive Table</h2>
        <div class="title">
            <h1>My Patients</h1>
        </div>
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Telephone</th>
                        <th>Email Address</th>
                        <th>Date of Birth</th>
                        <th>Events</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->patient->name }}</td>
                            <td>{{ $appointment->patient->contact_info }}</td>
                            <td>{{ $appointment->patient->email }}</td>
                            <td>{{ $appointment->patient->birth_date }}</td>
                            <td>
                                <a href="{{route('doctor.myPatient.show', $appointment->patient->id)}}" method="get">
                                    <button type="submit" class="view-button">View</button>
                                 </a>     
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>