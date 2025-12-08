    function toggleDropdown() {
      const dropdown = document.querySelector('.profile-dropdown');
      dropdown.classList.toggle('active');
    }

    // Optional: Close dropdown when clicking outside
    window.addEventListener('click', function(e) {
      const dropdown = document.querySelector('.profile-dropdown');
      if (!dropdown.contains(e.target)) {
        dropdown.classList.remove('active');
      }
    });

    function logout() {
    // Optional: add logout logic here (clear session, etc.)
     window.location.href = '/'; // Redirect to front page
  }
