<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin/schedule_create.css') }}">
    <title>Document</title>
    <style>
        * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f0f2f5;
}
.logo{

    text-align: center;
}

.form-container {
    background-color: #ffffff;
    padding: 20px 30px;
    border-radius: 8px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

.form-container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333333;
}

form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

form div {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
}

input[type="text"],
input[type="date"],
input[type="time"],
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    box-sizing: border-box;
}

input[type="text"]:focus,
input[type="date"]:focus,
input[type="time"]:focus,
select:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
}

button {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
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