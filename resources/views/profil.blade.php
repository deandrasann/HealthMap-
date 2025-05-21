@extends('navbar')
@section('content')


    <!-- Kartu Kiri: Foto Profil -->
<div class="container py-5">
  <div class="row g-4">

        <div class="col-md-4">
        <div class="card p-4 text-center">
            <div class="d-flex justify-content-center mb-3">
            <img src="{{ asset('images/profile.jpg') }}" class="rounded img-fluid w-50">
            </div>
            <h5 class="fw-bold mb-0" id="username"></h5>
            <small class="text-muted">Staff Dinas Kesehatan</small>
        </div>
        </div>

    <!-- Informasi Personal -->
    <div class="col-md-8">
      <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="fw-bold mb-0">Informasi Personal</h5>
          <button id="editButton" class="btn btn-outline-success btn-sm" onclick="toggleEdit()">
            <i class="bi bi-pencil"></i> Edit
          </button>
        </div>
        <form id="profileForm">
          <div class="mb-2">
            <label class="form-label">ID User</label>
            <input type="text" class="form-control" value="" id="id" readonly>
          </div>
          <div class="mb-2">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" value="" id="user-name" readonly>
          </div>
          <div class="mb-2">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="" id="email" readonly>
          </div>
          <div class="mb-2">
            <label class="form-label">Role</label>
            <input type="text" class="form-control" value="" id="role" readonly>
          </div>
          <div class="mb-2">
            <label class="form-label">Unit</label>
            <input type="text" class="form-control" value="" id="unit" readonly>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    let isEditing = false;

    function toggleEdit() {
        const form = document.getElementById("profileForm");
        const inputs = form.querySelectorAll("input");
        const button = document.getElementById("editButton");

        if (!isEditing) {
            // Aktifkan edit
            inputs.forEach(input => input.removeAttribute("readonly"));
            button.innerHTML = '<i class="bi bi-save"></i> Simpan';
            button.classList.remove("btn-outline-success");
            button.classList.add("btn-success");
        } else {
        // Simpan perubahan (saat ini hanya menonaktifkan edit)
            inputs.forEach(input => input.setAttribute("readonly", true));
            button.innerHTML = '<i class="bi bi-pencil"></i> Edit';
            button.classList.remove("btn-success");
            button.classList.add("btn-outline-success");
        // Di sini kamu bisa kirim data ke server via AJAX atau form submission
        }

        isEditing = !isEditing;
    }


    $(document).ready(function () {
        const token = localStorage.getItem('token');

        if (token) {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/user',
                type: 'GET',
                headers: {
                'Authorization': 'Bearer ' + token
                },
                success: function(user) {
                    $('#username').text(user.name);
                    $('#id').val(user.id);
                    $('#user-name').val(user.name);
                    $('#email').val(user.email);
                    $('#role').val(user.roles);
                    $('#unit').val(user.unit_posyandu);
                },
                    error: function(xhr) {
                    console.error('Failed to fetch user data:', xhr);
                }
            });
        }
    });
</script>


@endsection
