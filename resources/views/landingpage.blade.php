<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hero Section with Navigation</title>
  <link rel="stylesheet" href="{{ asset('css/landingpage.css') }}">
  <style>
    /* Reset some default styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    line-height: 1.6;
}

/* Navigation Bar */
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

/* Hero Section */
.hero {
    background: url('images/hero.jpg') no-repeat center center/cover;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: #fff;
    position: relative;
}



.hero-content h2 {
    font-size: 3rem;
    margin-bottom: 20px;
}

.hero-content p {
    font-size: 1.2rem;
    margin-bottom: 40px;
}

.hero-btn {
    background-color:  #31ad6b;
    color: #fff;
    padding: 12px 30px;
    text-decoration: none;
    border: 0px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.hero-btn:hover {
    background-color: #237b4c;
}

/* Media Queries for Responsiveness */

/* For smaller screens (phones) */
@media (max-width: 768px) {

    nav {
        flex-direction: column;
        align-items: flex-start;
    }

    .logo {
        padding-left: 0;
        font-size: 1.5rem;
    }

    .nav-links {
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
        margin-top: 10px;
    }

    .cta-btn {
        padding: 8px 15px;
        font-size: 0.9rem;
    }

    .hero-content h2 {
        font-size: 2.2rem;
     
    }

    .hero-content p {
        font-size: 1rem;
    }

    .hero-btn {
        padding: 10px 25px;
    }
}

/* For extra small screens (phones below 500px) */
@media (max-width: 500px) {

    nav {
        padding: 15px;
    }

    .hero {
        height: 80vh;
        background-size: cover;
    }

    .hero-content h2 {
        font-size: 1.8rem;
    }

    .hero-content p {
        font-size: 0.9rem;
    }

    .hero-btn {
        padding: 8px 20px;
        font-size: 0.9rem;
    }
}

  </style>
</head>
<body>
  <!-- Navigation Bar -->
  <header>
    <nav>
      <div class="logo">
        <div class="navbar-logo">
          <a href="{{ route('admin.login') }}" method="get"><!-- Add the link here -->
            <img src="{{ asset('images/logo1.png') }}" alt="HealthHub Logo" style="width: 150px; height: auto; max-height: 80px;">
          </a>
          </div>

      </div>
      <div class="right-nav">
        <ul class="nav-links">
          
        </ul>
        <a href="{{route("patient.login")}}" method="get" class="cta-btn">Get Started</a>
        <a href="{{route("login")}}" method="get" class="cta-btn">Login here if you're doctor</a>
      </div>
    </nav>
  </header>
  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-content">
      <h2>Avoid Hassles & Delays.</h2>
      <p>How is health today, Sounds like not good!</p>
      <form action="{{route('patient.create')}}" method="get">
        @csrf
        <button class="hero-btn">Make Appointment</button>
      </form>
   
    </div>
  </section>
</body>
</html>