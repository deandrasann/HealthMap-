@extends('navbar')
@section('content')
<div class="container py-5">
    <div class="card card-custom p-4 h-100 w-100">
    <h1 class="fw-bold text-start mb-4">Notifikasi Status Gizi Buruk</h1>

    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th >Waktu</th>
                    <th>Kecamatan</th>
                    <th>Posyandu</th>
                    <th class="text-center">Jumlah Kasus</th>
                    <th class="text-center">Lihat Data Anak</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>24/03/2025<br><small>10:09</small></td>
                    <td>Gamping</td>
                    <td>Posyandu Melati</td>
                    <td class="text-center fw-bold">2</td>
                    <td class="text-center">
                        <a href="{{ route('data-terbaru') }}" class="btn btn-outline-success btn-sm">Lihat Data</a>
                    </td>
                </tr>
                <tr class="table-light">
                    <td>24/03/2025<br><small>11:02</small></td>
                    <td>Turi</td>
                    <td>Posyandu Anggrek</td>
                    <td class="text-center fw-bold">3</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-outline-success btn-sm">Lihat Data</a>
                    </td>
                </tr>
                <tr>
                    <td>24/03/2025<br><small>10:09</small></td>
                    <td>Gamping</td>
                    <td>Posyandu Melati</td>
                    <td class="text-center fw-bold">2</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-outline-success btn-sm">Lihat Data</a>
                    </td>
                </tr>
                <tr class="table-light">
                    <td>24/03/2025<br><small>11:02</small></td>
                    <td>Turi</td>
                    <td>Posyandu Anggrek</td>
                    <td class="text-center fw-bold">3</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-outline-success btn-sm">Lihat Data</a>
                    </td>
                </tr>
                <tr>
                    <td>24/03/2025<br><small>10:09</small></td>
                    <td>Gamping</td>
                    <td>Posyandu Melati</td>
                    <td class="text-center fw-bold">2</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-outline-success btn-sm">Lihat Data</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    {{-- <div class="d-flex justify-content-center mt-4">
        {{ $data->links('pagination::bootstrap-5') }}
    </div> --}}
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


@endsection
