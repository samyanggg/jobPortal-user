<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Application Form | Job Portal</title>
  <link rel="stylesheet" href="{{ asset('assets/css/application.css') }}">
</head>
<body>

<div class="page-container">

  <header>
    <img src="{{ asset('assets/images/logo.png') }}" class="logo">
    <div class="welcome">
      <h3>Welcome back!!</h3>
      <p>Here's what's happening with your job today.</p>
    </div>
  </header>

  <h2 class="form-title">Application Form</h2>

  <form class="form-box">

    <div class="row">
      <input type="text" placeholder="Full Name">
      <input type="date" placeholder="Date of Birth">
    </div>

    <div class="row">
      <input type="text" placeholder="Gender">
      <input type="email" placeholder="Email Address">
      <input type="text" placeholder="Phone Number">
    </div>

    <textarea placeholder="Home Address"></textarea>

    <div class="row">
      <input type="text" placeholder="Ethnicity">
      <input type="text" placeholder="Nationality">
      <input type="text" placeholder="Preferred Pronouns">
    </div>

    <div class="row">
      <input type="text" placeholder="Position Applying For">
      <input type="text" placeholder="Program Name">
      <input type="text" placeholder="Languages Spoken">
    </div>

    <input type="file" class="file-input">

    <div class="btn-area">
      <button type="button" class="cancel-btn">Cancel</button>
      <button type="submit" class="apply-btn">Apply Job</button>
    </div>

  </form>

</div>

<script src="js/applicationform.js"></script>
</body>
</html>
