@extends('navbar')
@section('content')
<div class="container py-5">
    <div class="card card-custom p-4 h-100 w-100">
        <h1 class="fw-bold text-start mb-4">Data Anak</h1>

        {{-- Search Bar --}}
        <div class="input-group w-25 my-4">
            <input type="text" id="search-input" class="form-control" placeholder="Cari nama anak atau kecamatan..." aria-label="Search">
            <button class="input-group-text" id="search-button"><i class="fas fa-search" style="color: #27391C"></i></button>
        </div>

        {{-- Table --}}
        <div class="table-responsive">
            <table class="table table-striped align-middle" id="child-data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kecamatan</th>
                        <th>Nama Anak</th>
                        <th class="text-center">Tanggal Lahir</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Data Nutrisi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-4" id="pagination-container"></div>
    </div>
</div>

{{-- JQuery --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        const token = localStorage.getItem('token');
        const tbody = $('#child-data-table tbody');
        const searchInput = $('#search-input');

        function loadData(page = 1, keyword = '') {
            if (token) {
                $.ajax({
                    url: `http://127.0.0.1:8000/api/monitoring/child-data/get?page=${page}&search=${keyword}`,
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function (response) {
                        console.log('API response:', response);
                        if (response.data) {
                            tbody.empty();
                            response.data.forEach(item => {
                                const row = `
                                    <tr>
                                        <td>${item.id}</td>
                                        <td>${item.kecamatan}</td>
                                        <td>${item.name}</td>
                                        <td class="text-center">${item.birth_date}</td>
                                        <td class="text-center">${item.gender}</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-outline-success btn-sm">Lihat Data</a>
                                        </td>
                                    </tr>`;
                                tbody.append(row);
                            });

                            renderPagination(response.pagination, keyword);
                        }
                    },
                    error: function (xhr) {
                        console.error("Gagal ambil data:", xhr);
                    }
                });
            }
        }

        function renderPagination(pagination, keyword = '') {
            const container = $('#pagination-container');
            container.empty();
            for (let i = 1; i <= pagination.last_page; i++) {
                container.append(`
                    <button class="btn btn-sm btn-light mx-1 pagination-btn"
                        data-page="${i}"
                        data-keyword="${keyword}">
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
            const keyword = $(this).data('keyword') || '';
            loadData(page, keyword);
        });

        $('#search-input').on('input', function () {
            const keyword = $(this).val().trim();
            loadData(1, keyword);
        });

        loadData();
    });

</script>
@endsection
