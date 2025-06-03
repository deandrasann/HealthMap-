@extends('navbar')
@section('content')
<div class="container py-5">
    <div class="card card-custom p-4 h-100 w-100">
        <h1 class="fw-bold text-start mb-4">Data Anak</h1>
        <h2 class="fw-bold text-start mb-4" id="nama-posyandu"></h2>

        <div class="table-responsive">
            <table class="table table-striped align-middle" id="child-data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Anak</th>
                        <th class="text-center">Tanggal Lahir</th>
                        <th class="text-center">TB</th>
                        <th class="text-center">BB</th>
                        <th class="text-center">BMI</th>
                        <th class="text-center">Status Gizi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-4" id="pagination-container"></div>
    </div>

    <a href="{{ route('notifikasi') }}" class="btn btn-primary btn-sm border-dark fit-content mt-4 p-2"
        style="background-color: #FFFFFF !important">Kembali</a>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        const token = localStorage.getItem('token');
        const id = window.location.pathname.split('/').pop();
        const tbody = $('#child-data-table tbody');

        function loadData(page = 1) {
            if(token){
                $.ajax({
                    url: `http://127.0.0.1:8000/api/healthmap/malnutrition/posyandu/${id}?page=${page}`,
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function (response) {
                        console.log('API response:', response);
                        $('#nama-posyandu').text(response.posyandu.name)
                        if (response.data.data) {
                            tbody.empty();
                            response.data.data.forEach(item => {
                                const row = `
                                    <tr>
                                        <td>${item.child_id}</td>
                                        <td>${item.child_name}</td>
                                        <td>${item.birth_date}</td>
                                        <td>${item.height_cm}</td>
                                        <td>${item.weight_kg}</td>
                                        <td>${item.bmi}</td>
                                        <td class="text-center">
                                            <div class="border border-dark rounded border-2 d-inline-block px-2 py-1">
                                                ${item.nutrition_status}
                                            </div>
                                        </td>
                                    </tr>`;
                                tbody.append(row);
                            });
                            renderPagination(response.data);
                        }
                    },
                    error: function (xhr) {
                        console.error("Gagal ambil data:", xhr);
                    }
                });
            }
        }

        function renderPagination(pagination) {
            const container = $('#pagination-container');
            container.empty();
            for (let i = 1; i <= pagination.last_page; i++) {
                container.append(`
                    <button class="btn btn-sm btn-light mx-1 pagination-btn"
                        data-page="${i}">
                        ${i}
                    </button>
                `);
            }
            container.find(`button[data-page="${pagination.current_page}"]`)
                .addClass('btn-primary')
                .removeClass('btn-light');
        }

        $(document).on('click', '.pagination-btn', function () {
            const page = $(this).data('page');
            loadData(page);
        });

        loadData();
    })
</script>

@endsection
