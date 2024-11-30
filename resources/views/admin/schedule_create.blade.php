<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin/schedule_create.css') }}">
    <title>Document</title>
    <style>
     
     /* Reset some default styles */
body, html {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

/* Center the form container */
.form-container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

/* Style each form field */
form div {
    margin-bottom: 15px;
}

label {
    font-size: 16px;
    font-weight: bold;
    color: #333;
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="date"],
input[type="time"],
select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="text"]:focus,
input[type="date"]:focus,
input[type="time"]:focus,
select:focus {
    border-color: #007BFF;
    outline: none;
}

/* Style the submit button */
button[type="submit"] {
    background-color:  #46a585;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
    margin-top: 10px;
}

button[type="submit"]:hover {
    background-color: #348067;
}

/* Add responsiveness */
@media screen and (max-width: 600px) {
    .form-container {
        width: 90%;
        margin: 20px auto;
    }

    h2 {
        font-size: 20px;
    }
}


   </style>
</head>
<body>
    <div class="form-container">
        <h2>Add New Session</h2>
    <form action="{{ route('schedule.store') }}" method="POST">
        @csrf
    
        <!-- Session Title -->
        <div>
            <label for="title">Session Title:</label>
            <input type="text" name="title" id="title" required>
        </div>
    
        <!-- Select Doctor -->
        <div>
            <label for="doctor_id">Select Doctor:</label>
            <select name="doctor_id" id="doctor_id" required>
                <option value="">-- Choose Doctor --</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>
    
        <!-- Session Date -->
        <div>
            <label for="schedule_date">Session Date:</label>
            <input type="date" name="schedule_date" id="schedule_date" required>
        </div>
    
        <!-- Session Time -->
        <div>
            <label for="schedule_time">Session Time:</label>
            <input type="time" name="schedule_time" id="schedule_time" required>
        </div>
    
        <!-- Submit Button -->
        <button type="submit">Add Session</button>
    </form>
    </div>
    
    
</body>
</html>