<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            padding: 40px;
        }

        .profile-container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        h2 {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .info-group {
            margin-bottom: 15px;
        }

        .info-group label {
            font-weight: bold;
        }

        .info-group span {
            color: #444;
        }

        .edit-input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .btn {
            margin-top: 15px;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-edit {
            background: #0069d9;
            color: white;
        }

        .btn-save {
            background: #28a745;
            color: white;
        }

        .btn-cancel {
            background: #dc3545;
            color: white;
        }
    </style>
</head>

<body>

<div class="profile-container">
    <h2>My Profile</h2>

    {{-- Display Mode --}}
    <div id="displayMode">
        <div class="info-group">
            <label>Name:</label><br>
            <span id="dName">{{ auth()->user()->name }}</span>
        </div>

        <div class="info-group">
            <label>Email:</label><br>
            <span id="dEmail">{{ auth()->user()->email }}</span>
        </div>

        <div class="info-group">
            <label>Contact Number:</label><br>
            <span id="dContact">{{ auth()->user()->contact_number }}</span>
        </div>

        <div class="info-group">
            <label>Age:</label><br>
            <span id="dAge">{{ auth()->user()->age }}</span>
        </div>

        <div class="info-group">
            <label>Address:</label><br>
            <span id="dAddress">{{ auth()->user()->address }}</span>
        </div>

        <div class="info-group">
            <label>About:</label><br>
            <span id="dAbout">{{ auth()->user()->about }}</span>
        </div>

        <button class="btn btn-edit" onclick="enableEdit()">Edit Profile</button>
        <a class="btn btn-edit" style="text-decoration: none" href="{{ route('viewUserDashboard') }}">Back</a>

    </div>

    {{-- Edit Mode --}}
    <div id="editMode" style="display: none;">
        <form id="updateForm">
            @csrf

            <div class="info-group">
                <label>Name:</label>
                <input type="text" name="name" class="edit-input" value="{{ auth()->user()->name }}">
            </div>

            <div class="info-group">
                <label>Contact Number:</label>
                <input type="text" name="contact_number" class="edit-input" value="{{ auth()->user()->contact_number }}">
            </div>

            <div class="info-group">
                <label>Age:</label>
                <input type="number" name="age" class="edit-input" value="{{ auth()->user()->age }}">
            </div>

            <div class="info-group">
                <label>Address:</label>
                <input type="text" name="address" class="edit-input" value="{{ auth()->user()->address }}">
            </div>

            <div class="info-group">
                <label>About:</label>
                <textarea name="about" class="edit-input" rows="3">{{ auth()->user()->about }}</textarea>
            </div>

            <button type="button" class="btn btn-save" onclick="saveProfile()">Save Changes</button>
            <button type="button" class="btn btn-cancel" onclick="cancelEdit()">Cancel</button>
        </form>
    </div>

</div>

<script>
    function enableEdit() {
        document.getElementById('displayMode').style.display = 'none';
        document.getElementById('editMode').style.display = 'block';
    }

    function cancelEdit() {
        document.getElementById('editMode').style.display = 'none';
        document.getElementById('displayMode').style.display = 'block';
    }

    function saveProfile() {
        let formData = new FormData(document.getElementById('updateForm'));

        fetch("{{ route('updateProfile') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: formData
        })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('dName').innerText = formData.get('name');
                    document.getElementById('dContact').innerText = formData.get('contact_number');
                    document.getElementById('dAge').innerText = formData.get('age');
                    document.getElementById('dAddress').innerText = formData.get('address');
                    document.getElementById('dAbout').innerText = formData.get('about');

                    cancelEdit();
                }
            });
    }
</script>

</body>
</html>
