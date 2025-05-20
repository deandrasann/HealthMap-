@extends('navbar')
@section('content')


    <!-- Kartu Kiri: Foto Profil -->
<div class="container py-5">
  <div class="row g-4">

<div class="col-md-4 d-flex">
  <div class="card p-4 text-center">
    <div class="d-flex justify-content-center mb-3">
      <img src="{{ asset('images/profile.jpg') }}" class="rounded img-fluid w-50">
    </div>
    <h5 class="fw-bold mb-0">Narji Escobar</h5>
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
            <input type="text" class="form-control" value="123456" readonly>
          </div>
          <div class="mb-2">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="narji@example.com" readonly>
          </div>
          <div class="mb-2">
            <label class="form-label">Alamat</label>
            <input type="text" class="form-control" value="Jakarta Selatan" readonly>
          </div>
          <div class="mb-2">
            <label class="form-label">Role</label>
            <input type="text" class="form-control" value="Staff" readonly>
          </div>
          <div class="mb-2">
            <label class="form-label">Status</label>
            <input type="text" class="form-control" value="Aktif" readonly>
          </div>
          <div class="mb-2">
            <label class="form-label">No Telp</label>
            <input type="text" class="form-control" value="081234567890" readonly>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

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
</script>


@endsection
