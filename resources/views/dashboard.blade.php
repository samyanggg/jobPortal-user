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
    <div class="logo-container">
        <img src="{{ asset('assets/images/logo.png') }}" class="top-logo-img" alt="Logo">
        <span class="logo-text">JOB PORTAL</span>
    </div>

    <div class="right-header">
        <a href="{{ route('viewNotification') }}" class="notification">
            <span class="notif-icon">&#128276;</span>
        </a>


        <div class="profile-dropdown" onclick="toggleDropdown()">
            <div class="profile">
                <img src="{{ asset('assets/images/profile.jpg') }}" alt="Profile" />
                <span>SAMYANG G <br><small>Employer</small></span>
                <i class="arrow">&#9662;</i>
            </div>
            <div class="dropdown-menu" id="profileMenu">
                <a href="{{ route('viewProfile') }}">View Profile</a>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0; padding: 0;">
                    @csrf
                    <button type="submit" style="
                        width: 100%;
                        text-align: left;
                        padding: 12px 18px;
                        border: none;
                        background: none;
                        cursor: pointer;
                        font-size: 15px;
                        color: #333;
                    ">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MAIN CONTENT -->
<main>
    <section class="jobs-section">
        <div class="jobs-header">
            <h3>Available Jobs</h3>
            <form method="GET" action="{{ route('viewUserDashboard') }}" class="search-bar">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Job">
                <button type="submit">Search</button>
            </form>
        </div>

        <div class="jobs-grid">
            @forelse($jobs as $job)
                <div class="job-card">
                    <img src="{{ $job->image ? asset($job->image) : asset('assets/images/default-job.png') }}" alt="image"/>
                    <h4>{{ $job->job_name }}</h4>
                    <button onclick="openJobPopup(
                        '{{ $job->id }}',
                        '{{ $job->job_name }}',
                        '{{ $job->image ? $job->image : 'assets/images/default-job.png' }}',
                        '{{ $job->created_at->format('F d, Y') }}',
                        `{{ addslashes($job->job_description) }}`,
                        '{{ addslashes($job->company_name) }}',
                        '{{ $job->job_type }}',
                        '{{ $job->salary_minimum }}',
                        '{{ $job->salary_maximum }}',
                        '{{ $job->schedule_day }}',
                        '{{ $job->schedule_time }}',
                        '{{ addslashes($job->location) }}',
                        '{{ $job->number_of_vacancies }}'
                    )">View Job</button>

                </div>
            @empty
                <p>No Job Available</p>
            @endforelse
        </div>
    </section>
</main>

<!-- JOB POPUP -->
<div id="jobPopup" class="popup-overlay">
    <div class="popup-box">
        <button id="closePopup" class="close-btn" onclick="closeJobPopup()">X</button>

        <div class="popup-content">
            <div class="filter-section">
                <p><strong>Job type</strong></p>
                <p id="filterJobType"></p>

                <br>
                <p><strong>Salary</strong></p>
                <p>Min <b id="filterSalaryMin"></b> &nbsp;&nbsp; Max <b id="filterSalaryMax"></b></p>

                <br>
                <p><strong>Work Schedule</strong></p>
                <p id="filterSchedule"></p>
            </div>


            <div class="job-details">
                <img id="popupImage" src="" alt="Job Image" class="popup-img">
                <h3 id="popupTitle">Job Title</h3>
                <p id="popupCompany">Company: </p>
                <p id="popupDate">Date Posted: </p>
                <p id="popupType">Job Type: </p>
                <p id="popupSalary">Salary: </p>
                <p id="popupSchedule">Schedule: </p>
                <p id="popupLocation">Location: </p>
                <p id="popupVacancies">Vacancies: </p>

                <h4>Job Description</h4>
                <p id="popupDescription">Job Description goes here.</p>

                <button id="applyBtn" class="apply-btn">APPLICATION FORM</button>
            </div>
        </div>
    </div>
</div>

<script>
    // OPEN POPUP
    function openJobPopup(id, title, image, datePosted, description, company, type, salary_minimum, salary_maximum, scheduleDay, scheduleTime, location, vacancies) {
        document.getElementById("popupTitle").innerText = title;
        document.getElementById("popupCompany").innerText = 'Company: ' + company;
        document.getElementById("popupDate").innerText = 'Date Posted: ' + datePosted;
        document.getElementById("popupType").innerText = 'Job Type: ' + type;
        document.getElementById("popupSalary").innerText = 'Salary: ' + salary_minimum + ' - ' + salary_maximum;
        document.getElementById("popupSchedule").innerText = 'Schedule: ' + scheduleDay + ', ' + scheduleTime;
        document.getElementById("popupLocation").innerText = 'Location: ' + location;
        document.getElementById("popupVacancies").innerText = 'Vacancies: ' + vacancies;
        document.getElementById("filterJobType").innerText = type;
        document.getElementById("filterSalaryMin").innerText = salary_minimum;
        document.getElementById("filterSalaryMax").innerText = salary_maximum;
        document.getElementById("filterSchedule").innerText = scheduleDay + ", " + scheduleTime;


        // FIXED IMAGE HANDLING — USE DB PATH DIRECTLY
        if (image === 'assets/images/default-job.png') {
            document.getElementById("popupImage").src = "{{ asset('assets/images/default-job.png') }}";
        } else {
            document.getElementById("popupImage").src = "{{ url('/') }}/" + image;
        }


        document.getElementById("popupDescription").innerText = description;

        // APPLY FORM BUTTON
        document.getElementById("applyBtn").setAttribute("onclick", "openApplicationForm(" + id + ")");

        document.getElementById("jobPopup").style.display = "flex";
    }

    function closeJobPopup() {
        document.getElementById("jobPopup").style.display = "none";
    }

    function toggleDropdown() {
        document.getElementById('profileMenu').classList.toggle('show');
    }

    window.onclick = function(event) {
        if (!event.target.closest('.profile-dropdown')) {
            const menu = document.getElementById('profileMenu');
            if(menu.classList.contains('show')){
                menu.classList.remove('show');
            }
        }
    };

    function openApplicationForm(jobId) {
        window.location.href = `/application-form/${jobId}`;
    }
</script>

</body>
</html>
