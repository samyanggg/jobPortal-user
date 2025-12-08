<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile | Job Portal</title>
  <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
</head>
<body>
  <div class="container">

    <!-- SIDEBAR -->
    <aside class="sidebar">
      <div>
        <div class="logo">
          <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" />
          <h2>JOB PORTAL</h2>
        </div>
      </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">
      <header class="header">
        <div>
          <h2>My Profile</h2>
          <p>View and edit your personal information</p>
        </div>
      </header>

      <section class="profile-section">
        <div class="profile-card">

          <img src="{{ asset('assets/images/profile.jpg') }}" class="profile-img" alt="Profile Picture">

          <!-- DISPLAY MODE -->
          <div id="displayMode">
            @if(auth()->check()) <!-- Check if user is authenticated -->
              <div class="info-box"><label>Name:</label><span id="pname2">{{ auth()->user()->name }}</span></div>
              <div class="info-box"><label>Email:</label><span id="pemail">{{ auth()->user()->email }}</span></div>
              <div class="info-box"><label>Phone:</label><span id="pphone">{{ auth()->user()->phone }}</span></div>
              <div class="info-box"><label>Age:</label><span id="page">{{ auth()->user()->age }}</span></div>
              <div class="info-box"><label>Address:</label><span id="paddress">{{ auth()->user()->address }}</span></div>
              <div class="info-box"><label>About Me:</label><span id="pbio">{{ auth()->user()->about }}</span></div>

              <div class="profile-buttons">
                <a href="/dashboard" class="back-btn">Back To Dashboard</a>
                <button id="editBtn" class="btn btn-primary">Edit Profile</button>
              </div>
            @else
              <div class="info-box"><label>Name:</label><span id="pname2">Guest</span></div>
              <div class="info-box"><label>Email:</label><span id="pemail">Not Available</span></div>
              <div class="info-box"><label>Phone:</label><span id="pphone">Not Available</span></div>
              <div class="info-box"><label>Age:</label><span id="page">Not Available</span></div>
              <div class="info-box"><label>Address:</label><span id="paddress">Not Available</span></div>
              <div class="info-box"><label>About Me:</label><span id="pbio">Not Available</span></div>

              <div class="profile-buttons">
                <a href="/login" class="back-btn">Login to Edit</a>
              </div>
            @endif
          </div>

          <!-- EDIT MODE (HIDDEN AT FIRST) -->
          @if(auth()->check()) <!-- Show edit mode only if user is authenticated -->
            <div id="editMode" style="display:none;">
              <form id="updateForm">
                @csrf

                <label>Phone:</label>
                <input type="text" name="phone" value="{{ auth()->user()->phone }}">

                <label>Age:</label>
                <input type="number" name="age" value="{{ auth()->user()->age }}">

                <label>Address:</label>
                <input type="text" name="address" value="{{ auth()->user()->address }}">

                <label>About Me:</label>
                <textarea name="about">{{ auth()->user()->about }}</textarea>

                <div class="profile-buttons">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                  <button type="button" id="cancelBtn" class="back-btn">Cancel</button>
                </div>
              </form>

              <p id="message" style="margin-top:10px;"></p>
            </div>
          @endif

        </div>
      </section>
    </main>
  </div>

  <script>
    // Switch to edit mode
    document.getElementById("editBtn")?.addEventListener("click", () => {
      document.getElementById("displayMode").style.display = "none";
      document.getElementById("editMode").style.display = "block";
    });

    // Cancel editing
    document.getElementById("cancelBtn")?.addEventListener("click", () => {
      document.getElementById("editMode").style.display = "none";
      document.getElementById("displayMode").style.display = "block";
    });

    // AJAX update (no redirect, no new page)
    document.getElementById("updateForm")?.addEventListener("submit", function(e) {
      e.preventDefault();

      let formData = new FormData(this);

      fetch("{{ route('profile.update') }}", {
        method: "POST",
        headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" },
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        document.getElementById("message").innerText = "Profile updated successfully!";

        // Update display values immediately
        document.getElementById("pphone").innerText = formData.get("phone");
        document.getElementById("page").innerText = formData.get("age");
        document.getElementById("paddress").innerText = formData.get("address");
        document.getElementById("pbio").innerText = formData.get("about");

        // Switch back to display mode
        setTimeout(() => {
          document.getElementById("editMode").style.display = "none";
          document.getElementById("displayMode").style.display = "block";
        }, 800);
      });
    });
  </script>

</body>
</html>
