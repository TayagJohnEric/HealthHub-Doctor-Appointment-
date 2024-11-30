<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Registration Form</title>
    <link rel="stylesheet" href="{{ asset('css/admin/doctor_create.css') }}">
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
    display: flex;
    flex-direction: column;
}

label {
    font-size: 14px;
    color: #333333;
    margin-bottom: 5px;
    margin-top: 15px;
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="password"] {
    padding: 10px;
    font-size: 14px;
    border: 1px solid #cccccc;
    border-radius: 4px;
    width: 100%;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="tel"]:focus,
input[type="password"]:focus {
    border-color: #46a588;
    outline: none;
}

button {
    background-color: #46a588;
    color: #ffffff;
    font-size: 16px;
    padding: 10px;
    margin-top: 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #3e8c72;
}

select {
    padding: 10px;
    font-size: 14px;
    border: 1px solid #cccccc;
    border-radius: 4px;
    width: 100%;
    box-sizing: border-box;
}

select:focus {
    border-color: #46a588;
    outline: none;
}


    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add New Doctor</h2>

        <!-- Display a general validation error message if there are any errors -->
        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('doctor.store') }}" method="POST">
            @csrf

            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="telephone">Telephone</label>
            <input type="tel" id="contact_info" name="contact_info" value="{{ old('contact_info') }}" required>
            @error('contact_info')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="specialities">Specialities</label>
            <select id="specialities" name="specialities" required>
             <option value="">Select a specialit</option>
             <option value="Cardiology" {{ old('specialities') == 'Cardiology' ? 'selected' : '' }}>Cardiology</option>
             <option value="Dermatology" {{ old('specialities') == 'Dermatology' ? 'selected' : '' }}>Dermatology</option>
             <option value="Neurology" {{ old('specialities') == 'Neurology' ? 'selected' : '' }}>Neurology</option>
             <option value="Pediatrics" {{ old('specialities') == 'Pediatrics' ? 'selected' : '' }}>Pediatrics</option>
             <option value="Radiology" {{ old('specialities') == 'Radiology' ? 'selected' : '' }}>Radiology</option>
    <!-- Add more options as needed -->
           </select>
            @error('specialities')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="password_confirmation" required>
            @error('password_confirmation')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <button type="submit">Add</button>
        </form>
        <form action="{{route('admin.doctor.index')}}" method="get">
            <button>Back To List</button>
        </form>
    </div>
</body>
</html>