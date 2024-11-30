<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make an Appointment</title>
    <link rel="stylesheet" href="{{ asset('css/register_patient.css') }}"> <!-- Link to CSS file -->
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #fafeff;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 600px;
    margin: auto;
    background: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.error {
    color: red;
    font-size: 0.875em;
    margin-top: 5px;
}

.logo img {
    width: 200px; /* Adjust to desired size */
    height: auto; /* Keeps the aspect ratio */
    cursor: pointer;
    margin-left: 170px;
}

h3 {
    text-align: center;
    color: rgb(18, 118, 75);
}

fieldset {
    border: 1px solid #dfdfdf;
    border-radius: 5px;
    margin-bottom: 20px;
    padding: 10px;
}

legend {
    font-weight: bold;
    padding: 0 10px;
}

label {
    display: block;
    margin: 10px 0 5px;
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="date"],
input[type="time"],
input[type="password"], /* Added this line */
select,
textarea {
    width: 90%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 10px;
    background-color: #fafeff;
}

.checkbox-container {
    margin: 15px 0;
    display: flex;
    gap: 5px;
}

button {
    width: 100%;
    background-color: rgb(18, 142, 89);
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease; /* Add this line for smooth transition */
    
}

button:hover {
    background-color: rgb(16, 104, 66);
}

    </style>
</head>
<body>

    
    <div class="container">
        <div class="logo">
            <a href="{{ route('landingpage') }}" method="get"><!-- Add the link here -->
                <img src="{{ asset('images/logo1.png') }}" alt="HealthHub Logo" style="width: 150px; height: auto; max-height: 80px;">
              </a>
        </div>
        <h3>Make an Appointment</h3>
        <form id="appointment-form" action="{{ route('patients.store') }}" method="POST">
            @csrf
            <fieldset>
                <legend>Patient Information</legend>
                
                <label for="full-name">Full Name:</label>
                <input type="text" id="full-name" name="full-name" required>
                @error('full-name')
                    <div class="error">{{ $message }}</div>
                @enderror
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
                
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
                @error('phone')
                    <div class="error">{{ $message }}</div>
                @enderror
                
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>
                @error('dob')
                    <div class="error">{{ $message }}</div>
                @enderror
                
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="" disabled selected>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                @error('gender')
                    <div class="error">{{ $message }}</div>
                @enderror
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="password_confirmation" required>
                @error('password_confirmation')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="reason">Reason for Appointment:</label>
                <textarea id="discription" name="discription" rows="4" placeholder="Brief description (optional)"></textarea>
            </fieldset>

            <div class="checkbox-container">
                <input type="checkbox" id="confirm" name="confirm" required>
                <label for="confirm">I confirm that the above information is accurate.</label>
                @error('confirm')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>