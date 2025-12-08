<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Job Portal</title>
  <link rel="stylesheet" href="{{ asset('assets/css/frontpage.css') }}">
</head>
<body>
  <div class="page-frame">
   <header class="site-header">
  <div class="brand">
    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="logo">
    <span class="brand-title">JOB PORTAL</span>
  </div>

  <nav class="nav-actions">
    <a href="{{ route('login') }}" class="btn-signin">Sign In</a>
    <a href="{{ route('register') }}" class="btn-register">Register</a>
  </nav>
</header>


    <main class="hero">
      <div class="hero-overlay">
        <h1 class="hero-title">
          Find your next Job or
          <span class="hero-highlight">Perfect Hire</span>
        </h1>
      </div>
    </main>
  </div>

  </main>

<!-- ✅ About / Vision / Mission Section -->
<section style="padding: 60px 20px; background:#eef3ff; text-align:center;">
    <h2 style="font-size: 36px; font-weight: bold;">About Us</h2>
    <p style="max-width: 900px; margin: 20px auto; font-size: 18px; line-height: 1.6;">
        The DOLE Surigao del Norte Field Office, as part of the national Department of Labor and 
        Employment (DOLE), aims to promote gainful employment and worker welfare, focusing on 
        empowering people through knowledge, skills, and access to economic opportunities. 
        While specific mission, vision, and core values for the local Surigao City office 
        aren't detailed, the national DOLE's mission is to promote manpower development and 
        secure workers' rights, with core values including loyalty, simple living, political neutrality, 
        and commitment to democracy.
    </p>

    <h2 style="font-size: 36px; font-weight: bold; margin-top:40px;">Vision</h2>
    <p style="max-width: 900px; margin: 20px auto; font-size: 18px; line-height: 1.6;">
        With the Blessings of the Divine Providence, Surigao City 2040: A Smart City of Resilient People, 
        Enjoying a Healthy and Pleasant Environment, Driven by a Progressive, Competitive, Sustainable 
        Economy and Guided by a Transparent Accountable Governance.
    </p>

    <h2 style="font-size: 36px; font-weight: bold; margin-top:40px;">Mission</h2>
    <p style="max-width: 900px; margin: 20px auto 60px; font-size: 18px; line-height: 1.6;">
        To empower workers and employers through education and support, and to facilitate employment 
        and entrepreneurship in Surigao del Norte.
    </p>
</section>

<!-- ✅ Footer Section -->
<footer style="background: #0a56a5; color: white; padding: 40px 20px; display:flex; justify-content:space-around; flex-wrap:wrap; text-align:center;">
    <div>
        <h3>Contact</h3>
        <p>📞 85-359-833</p>
    </div>
    <div>
        <h3>DOLE</h3>
        <p>Photos Policy</p>
    </div>
    <div>
        <h3>Follow Us</h3>
        <p>📘 Facebook &nbsp;&nbsp; 🐦 Twitter &nbsp;&nbsp; 📸 Instagram</p>
    </div>
</footer>


<!-- Scripts -->
<script src="js/frontpage.js"></script>

</body>
</html>