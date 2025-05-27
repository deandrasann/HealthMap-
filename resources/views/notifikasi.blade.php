@extends('navbar')
@section('content')
<div class="container py-5">
    <div class="card card-custom p-4 h-100 w-100">
    <h1 class="fw-bold text-start mb-4">Notifikasi Status Gizi Buruk</h1>

    <div class="table-responsive">
        <table class="table table-striped align-middle" id="data-table">
            <thead>
                <tr>
                    <th>Waktu</th>
                    <th>Kecamatan</th>
                    <th>Posyandu</th>
                    <th class="text-center">Jumlah Kasus</th>
                    <th class="text-center">Lihat Data Anak</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-4" id="pagination-container"></div>

    </div>
</div>

{{-- @foreach ($data as $row)
<tr class="{{ $loop->even ? 'table-light' : '' }}">
    <td>{{ \Carbon\Carbon::parse($row->waktu)->format('d/m/Y H:i') }}</td>
    <td>{{ $row->kecamatan }}</td>
    <td>{{ $row->posyandu }}</td>
    <td class="text-center fw-bold">{{ $row->jumlah_kasus }}</td>
    <td class="text-center">
        <a href="{{ route('data-anak', ['id' => $row->id]) }}" class="btn btn-outline-success btn-sm">Lihat Data</a>
    </td>
</tr>
@endforeach --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        const token = localStorage.getItem('token');
        const tbody = $('#data-table tbody');

        function loadData(page = 1) {
            if (token) {
                $.ajax({
                    url: `http://127.0.0.1:8000/api/healthmap/malnutrition?page=${page}`,
                    type: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function (response) {
                        console.log('API response:', response);
                        if (response.data.data) {
                            tbody.empty();
                            response.data.data.forEach(item => {
                                const row = `
                                    <tr>
                                        <td>${item.latest_date}</td>
                                        <td>${item.kecamatan_name}</td>
                                        <td>${item.posyandu_name}</td>
                                        <td class="text-center">${item.case_count}</td>
                                        <td class="text-center">
                                            <a href="/data-terbaru/${item.posyandu_id}" class="btn btn-outline-success btn-sm">Lihat Data</a>
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
    });
</script>
@endsection
