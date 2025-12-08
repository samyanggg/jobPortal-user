<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Job Portal Dashboard</title>
  <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
</head>
<body>

  <!-- UPDATED TOP LOGO HEADER -->
  <div class="top-logo">

      <!-- LOGO + TITLE -->
      <div class="logo-container">
          <img src="{{ asset('assets/images/logo.png') }}" class="top-logo-img" alt="Logo">
          <span class="logo-text">JOB PORTAL</span>
      </div>

      <!-- RIGHT SIDE: NOTIFICATION + PROFILE -->
      <div class="right-header">

          <!-- Notification Icon -->
          <div class="notification">
              <span class="notif-icon">&#128276;</span>
          </div>

          <!-- Profile Dropdown -->
          <div class="profile-dropdown" onclick="toggleDropdown()">
              <div class="profile">
                  <img src="{{ asset('assets/images/profile.jpg') }}" alt="Profile" />
                  <span>SAMYANG G <br><small>Employer</small></span>
                  <i class="arrow">&#9662;</i>
              </div>

              <!-- DROPDOWN MENU -->
              <div class="dropdown-menu" id="profileMenu">
                  <a href="{{ route('profile.show') }}">View Profile</a>
                  <a href="/">Logout</a>
              </div>
          </div>

      </div>

  </div>

  <!-- MAIN CONTENT -->
  <main>
    <section class="jobs-section">
      <div class="jobs-header">
        <h3>Available Jobs</h3>

        <div class="search-bar">
          <input type="text" placeholder="Search Job">
          <button>All Categories</button>
        </div>
      </div>

       <div class="jobs-grid">
        <div class="job-card" onclick="openJobPopup('Carpenter', 'carpenter.png', 'October 9, 2025', 'Responsible for constructing, installing, and repairing structures and fixtures made from wood and other materials.')">
          <img src="{{ asset('assets/images/carpenter.png') }}">
          <h4>Carpenter</h4>
          <button>View Job</button>
        </div>

        <div class="job-card">
          <img src="{{ asset('assets/images/baker.png') }}">
          <h4>Baker</h4>
          <button>View Job</button>
        </div>

        <div class="job-card">
          <img src="{{ asset('assets/images/mason.png') }}">
          <h4>Mason</h4>
          <button>View Job</button>
        </div>

        <div class="job-card">
          <img src="{{ asset('assets/images/electrical.png') }}">
          <h4>Electrical</h4>
          <button>View Job</button>
        </div>

        <div class="job-card">
          <img src="{{ asset('assets/images/computer.png') }}">
          <h4>Computer</h4>
          <button>View Job</button>
        </div>

        <div class="job-card">
          <img src="{{ asset('assets/images/cleaning.png') }}">
          <h4>Cleaning</h4>
          <button>View Job</button>
        </div>
      </div>
    </section>
  </main>
<!-- JOB POPUP -->
  <div id="jobPopup" class="popup-overlay">
    <div class="popup-box">
      <button id="closePopup" class="close-btn" onclick="closeJobPopup()">X</button>

      <div class="popup-content">
        <div class="filter-section">
          <h4>Filter jobs</h4>
          <a href="#" class="clear">Clear All</a>
          <p><strong>Job type</strong></p>
          <label><input type="checkbox"> Full-time</label><br>
          <label><input type="checkbox"> Contract</label><br>
          <label><input type="checkbox"> Part-time</label><br>
          <br>
          <p><strong>Salary</strong></p>
          <p>Min <b>800</b> &nbsp;&nbsp; Max <b>15000</b></p>
          <br>
          <p><strong>Work Schedule</strong></p>
          <p>Monday to Saturday,<br>8:00 AM – 5:00 PM</p>
        </div>

        <div class="job-details">
          <img id="popupImage" src="" alt="Job Image" class="popup-img">
          <h3 id="popupTitle">Job Title</h3>
          <p id="popupDate">Date Posted: October 9, 2025</p>
          <h4>Job Description</h4>
          <p id="popupDescription">Job Description goes here.</p>

          <button id="applyBtn" class="apply-btn">APPLICATION FORM</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Function to open the job popup and populate it with job details
    function openJobPopup(title, image, datePosted, description) {
      document.getElementById("popupTitle").innerText = title;
      document.getElementById("popupImage").src = "{{ asset('assets/images/') }}" + image;
      document.getElementById("popupDate").innerText = 'Date Posted: ' + datePosted;
      document.getElementById("popupDescription").innerText = description;
      
      // Show the popup
      document.getElementById("jobPopup").style.display = "flex"; // Show the popup
    }

    // Function to close the job popup
    function closeJobPopup() {
      document.getElementById("jobPopup").style.display = "none"; // Hide the popup
    }
  </script>

</body>
</html>
