@extends('navbar')
@section('content')
<div class="container py-5">
    <div class="card card-custom p-4 h-100 w-100">
    <h1 class="fw-bold text-start mb-4">Data Anak</h1>

    <div class="input-group w-25 my-4">
        <input type="text" class="form-control" placeholder="Search..." aria-label="Search">
        <button class="input-group-text"><i class="fas fa-search" style="color: #27391C"></i></button>
      </div>

    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th >NIK</th>
                    <th>Nama Anak</th>
                    <th class="text-center">Tempat Tanggal Lahir</th>
                    <th class="text-center">TB/BB</th>
                    <th class="text-center">BMI</th>
                    <th class="text-center">Status Gizi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>340216000000000</td>
                    <td>Gamping</td>
                    <td> Melati</td>
                    <td class="text-center">Yogyakarta, 30 Juni 2020</td>
                    <td class="text-center">Perempuan</td>
                    <td class="text-center">
                        <div class="border border-dark rounded border-2">Gizi Buruk</div>
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



@endsection

