

<div class="edit-container">
    <div class="edit-card">
        <header> 
            <link rel="stylesheet" href="{{ asset('assets/css/profile-edit.css') }}">
</header>
        <a href="/profile" class="back-btn-top">← Back</a>

        <h2>Edit Profile</h2>
<!-- Avatar Preview -->
@if($user?->avatar)
    <img src="{{ asset('storage/' . $user->avatar) }}" class="edit-avatar">
@endif


        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label>Name</label>
            <input type="text" name="name" value="{{ $user->name ?? '' }}">

            <label>Email</label>
            <input type="email" name="email" value="{{ $user->email ?? '' }}">

            <label>Phone</label>
            <input type="text" name="phone" value="{{ $user->phone ?? '' }}">

            <label>Age</label>
            <input type="number" name="age" value="{{ $user->age ?? '' }}">

            <label>Address</label>
            <input type="text" name="address" value="{{ $user->address ?? '' }}">

            <label>About</label>
            <textarea name="about">{{ $user->about ?? '' }}</textarea>

            <label>Profile Picture</label>
            <input type="file" name="avatar">

            <button class="save-btn">Save Changes</button>
        </form>

    </div>
</div>


