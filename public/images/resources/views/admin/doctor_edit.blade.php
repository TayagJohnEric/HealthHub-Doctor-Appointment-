<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>
    <link rel="stylesheet" href="{{ asset('css/admin/doctor_edit.css') }}">
    <style>
        /* General Reset */
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
            color: #333;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333333;
        }

        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: left;
        }

        .alert ul {
            list-style-type: none;
            padding-left: 0;
        }

        label {
            font-size: 16px;
            color: #333;
            display: block;
            text-align: left;
            margin-top: 15px;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        select:focus {
            border-color: #46a588;
            outline: none;
        }

        button {
            background-color: #46a588;
            color: #ffffff;
            font-size: 16px;
            padding: 12px;
            margin-top: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #3e8c72;
        }

        /* Styling for the secondary button */
        form + form button {
            background-color: #ccc;
            color: #333;
        }

        form + form button:hover {
            background-color: #bbb;
        }

    </style>
</head>
<body>


    
    <div class="container">
        <h1>Edit Doctor</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.doctor.update', $doctor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ old('name', $doctor->name) }}" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email', $doctor->email) }}" required>

            <label for="contact_info">Contact Info:</label>
            <input type="text" name="contact_info" value="{{ old('contact_info', $doctor->contact_info) }}" required>

            <label for="specialities">Specialities</label>
            <select id="specialities" name="specialities" required>
                <option value="" disabled selected>Select a speciality</option>
                <option value="Cardiology" {{ old('specialities', $doctor->specialization) == 'Cardiology' ? 'selected' : '' }}>Cardiology</option>
                <option value="Dermatology" {{ old('specialities', $doctor->specialization) == 'Dermatology' ? 'selected' : '' }}>Dermatology</option>
                <option value="Neurology" {{ old('specialities', $doctor->specialization) == 'Neurology' ? 'selected' : '' }}>Neurology</option>
                <option value="Pediatrics" {{ old('specialities', $doctor->specialization) == 'Pediatrics' ? 'selected' : '' }}>Pediatrics</option>
                <option value="Radiology" {{ old('specialities', $doctor->specialization) == 'Radiology' ? 'selected' : '' }}>Radiology</option>
            </select>

            <button type="submit">Update Doctor</button>
        </form>

        <form action="{{ route('admin.doctor.index') }}" method="get">
            <button>Back To List</button>
        </form>
    </div>
</body>
</html>
