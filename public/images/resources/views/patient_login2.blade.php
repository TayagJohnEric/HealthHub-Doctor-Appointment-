<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
  }

  header {
    position: absolute;
    top: 0;
    width: 100%;
    z-index: 1000;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add shadow here */
}

.right-nav {
    display: flex;
    gap: 20px;
}
.navbar-logo img {
height: 80px;
width: auto;
margin-left: 70px;
margin-bottom: 10px;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background: white;
}

.logo {
    color: #31ad6b;
    cursor: pointer;
    padding-left: 200px;
}

.nav-links {
    list-style: none;
    display: flex;
    gap: 15px;
}

.nav-links li {
    margin-left: 20px;
    padding-top: 10px;
}

.nav-links a {
    color: #095a2b;
    text-decoration: none;
    font-size: 13px;
    transition: color 0.3s;
}

.nav-links a:hover {
    color: #1fb333;
}

.cta-btn {
    background-color: #31ad6b;
    color: #fff;
    padding: 10px 20px;
    cursor: pointer;
    text-decoration: none;
    border-radius: 20px;
    transition: background-color 0.3s;
}

.cta-btn:hover {
    background-color: #2a8555;
}

  .login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    max-width: 500px; /* Increased max-width */
  }

  .login-form {
    width: 100%;
    padding: 60px 30px; /* Increased padding for more height */
    border-radius: 15px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
    text-align: center;
  }

  .login-form .logo {
    width: 150px; /* Slightly larger logo */
    margin-bottom: 10px;
  }

  .login-form .title {
    margin-bottom: 50px; /* Adjusted margin for more space below the title */
    color: #333;
  }

  .login-form .title h2{
   color: rgba(10, 82, 58, 0.8);
   margin-bottom: 5px;

  }

  .login-form .title h3{
    color: rgb(172, 157, 157);
    margin-bottom: 5px;

  }

  .login-form input {
    width: 100%;
    padding: 18px; /* Slightly larger input padding */
    margin-bottom: 25px; /* Space below input fields */
    border: 1px solid #ddd;
    border-radius: 20px;
    font-size: 16px;
    background-color:  #f7f7f7;
  }

  .login-form button {
    width: 100%;
    padding: 18px;
    border: none;
    border-radius: 25px;
    font-size: 18px; /* Larger button text */
    background-color: rgba(20, 116, 84, 0.8);
    color: #ffffff;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .login-form button:hover {
    background-color: rgba(10, 82, 58, 0.8);
  }

  .signup-link {
    margin-top: 30px; /* Increased margin for more space above signup link */
    display: flex;
    justify-content: center; /* Center-aligns the signup link section */
    gap: 5px;
  }

  .signup-link p {
    font-size: 16px;
    color: #333;
  }

  .signup-link a {
    color: #005780;
    text-decoration: none;
    font-size: 16px;
  }

  .signup-link a:hover {
    text-decoration: underline;
  }

  </style>
</head>
<body>

  <header>
    <nav>
      <div class="logo">
        <div class="navbar-logo">
          <a href="{{ route('landingpage') }}" method="get"><!-- Add the link here -->
            <img src="{{ asset('images/logo1.png') }}" alt="HealthHub Logo" style="width: 150px; height: auto; max-height: 80px;">
          </a>
          </div>
      </div>
      <div class="right-nav">
        <ul class="nav-links">
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <a href="{{route("patient.login")}}" method="get" class="cta-btn">Get Started</a>
      </div>
    </nav>
  </header>

  <div class="login-container">
    <form class="login-form" action="{{route('patient.authenticate')}}" method="POST">
      @csrf
      <img src="{{ asset('images/logo1.png') }}" alt="HealthHub Logo" style="width: 150px; height: auto; max-height: 80px;">
      <div class="title">
        <h2>Please Login Your Account Here</h2>
      </div>

      <!-- Error Message Display -->
      @if($errors->any())
          <div class="error-message">
              <p>{{ $errors->first() }}</p>
          </div>
      @endif

      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
      <div class="signup-link">
        <p>Dont have an account? </p>
        <a href="{{route('patient.create')}}">Create an account</a>
      </div>
    </form>
  </div>

</body>
</html>
