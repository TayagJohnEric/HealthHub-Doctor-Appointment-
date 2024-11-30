<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="{{ asset('css/patient/patient_edit.css') }}">
    <style>
    /* General reset and base styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f5f5f5;
}

/* Container styles */
.container {
    width: 100%;
    max-width: 500px;
    background-color: #ffffff;
    padding: 2em;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h2 {
    margin-bottom: 1.5em;
    color: #333;
    font-size: 1.8em;
}

/* Success message */
.alert-success {
    background-color: #dff0d8;
    color: #3c763d;
    border: 1px solid #d6e9c6;
    padding: 10px;
    margin-bottom: 1em;
    border-radius: 5px;
}

/* Form styles */
.form-group {
    margin-bottom: 1em;
    text-align: left;
}

.form-group label {
    display: block;
    margin-bottom: 0.3em;
    font-weight: bold;
    color: #555;
}

.form-control {
    width: 100%;
    padding: 0.75em;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1em;
    transition: border-color 0.2s ease-in-out;
}

.form-control:focus {
    border-color: #46a588;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
}

/* Button styles */
.btn-primary {
    background-color: #46a588;
    color: white;
    padding: 0.75em 1.5em;
    font-size: 1em;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
    margin-top: 1em;
    width: 100%;
}

.btn-primary:hover {
    background-color: #389e7f;
}

.btn-primary:focus {
    outline: none;
    box-shadow: 0 0 5px #46a588;
}

/* Back to Settings Button */
.btn-secondary {
    background-color: #f0f0f0;
    color: #333;
    padding: 0.75em 1.5em;
    font-size: 1em;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
    display: inline-block;
    margin-top: 1em; /* Adjusted to appear below the update button */
    text-decoration: none; /* Remove underline */
}

.btn-secondary:hover {
    background-color: #e2e2e2;
}

.btn-secondary:focus {
    outline: none;
    box-shadow: 0 0 5px #bbb;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Profile</h2>

        <!-- Display success message if profile updated -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('patient.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $patient->name) }}" required>
            </div>

            <div class="form-group">
                <label for="birth_date">Birth Date:</label>
                <input type="date" name="birth_date" id="birth_date" class="form-control" value="{{ old('birth_date', $patient->birth_date) }}" required>
            </div>

            <div class="form-group">
                <label for="contact_info">Contact Info:</label>
                <input type="text" name="contact_info" id="contact_info" class="form-control" value="{{ old('contact_info', $patient->contact_info) }}" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="Male" {{ old('gender', $patient->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender', $patient->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $patient->email) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        <!-- Back to Settings Button -->
        <a href="{{ route('patient.settings') }}" class="btn btn-secondary">Back to Settings</a>
    </div>
</body>
</html>