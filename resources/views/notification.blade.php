<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Job Portal Dashboard</title>
  <link rel="stylesheet" href="{{ asset('assets/css/notification.css') }}">
</head>
<body>

  <div class="page-frame">
    <!-- HEADER -->
    <header class="site-header">
      <div class="brand">
        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="logo">
        <h2>JOB PORTAL</h2>
      </div>
      <div class="user-info">
        <div class="user-avatar">
          <img src="{{ asset('assets/images/profile.jpg') }}" alt="User">
        </div>
        <div class="user-details">
          <strong>SAMYANG G</strong><br>
          <span>Employer</span>
        </div>
      </div>
    </header>

    <div class="dashboard">
      <!-- SIDEBAR -->
      <aside class="sidebar">
        <h3>DASHBOARD</h3>
        <button class="side-btn">Profile</button>
        <button class="side-btn">Available Job</button>
        <button class="side-btn active">Notification</button>
      </aside>

      <!-- MAIN CONTENT -->
      <main class="main-content">
        <h3>Welcome back!!</h3>
        <p class="subtitle">Here’s what’s happening with your job today.</p>

        <!-- Example Notification -->
        <div class="notification-card">
          <div class="notification-text">
            <strong>DOLE</strong> — Your application form has been submitted.
          </div>
          <button class="view-btn" onclick="viewNotification()">View</button>
        </div>
      </main>
    </div>
  </div>

  <script src="js/notification.js"></script>
</body>
</html>
