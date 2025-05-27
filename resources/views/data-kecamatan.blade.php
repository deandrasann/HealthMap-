@extends('navbar')
@section('content')
<div class="container py-5">
    <div class="card card-custom p-4 h-100 w-100">
    <h1 class="fw-bold text-start mb-4">Data Kecamatan</h1>

    <div class="input-group w-25 my-4">
        <input type="text" class="form-control" placeholder="Search..." aria-label="Search">
        <button class="input-group-text"><i class="fas fa-search" style="color: #27391C"></i></button>
      </div>

    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th >NIK</th>
                    <th>Kecamatan</th>
                    <th>Nama Anak</th>
                    <th class="text-center">Tempat Tanggal Lahir</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Data Nutrisi</th>
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
                        <a href="#" class="btn btn-outline-success btn-sm">Lihat Data</a>
                    </td>
                </tr>
                <tr class="table-light">
                    <td>340216000000000</td>
                    <td>Turi</td>
                    <td> Anggrek</td>
                    <td class="text-center">Yogyakarta, 30 Juni 2020</td>
                    <td class="text-center">Perempuan</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-outline-success btn-sm">Lihat Data</a>
                    </td>
                </tr>
                <tr>
                    <td>340216000000000</td>
                    <td>Gamping</td>
                    <td> Melati</td>
                    <td class="text-center">Yogyakarta, 30 Juni 2020</td>
                    <td class="text-center">Perempuan</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-outline-success btn-sm">Lihat Data</a>
                    </td>
                </tr>
                <tr class="table-light">
                    <td>340216000000000</td>
                    <td>Turi</td>
                    <td> Anggrek</td>
                    <td class="text-center">Yogyakarta, 30 Juni 2020</td>
                    <td class="text-center">Perempuan</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-outline-success btn-sm">Lihat Data</a>
                    </td>
                </tr>
                <tr>
                    <td>340216000000000</td>
                    <td>Gamping</td>
                    <td> Melati</td>
                    <td class="text-center">Yogyakarta, 30 Juni 2020</td>
                    <td class="text-center">Perempuan</td>


                    <td class="text-center">
                        <a href="#" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#exampleModal">Lihat Data</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>

    {{-- Pagination --}}
    {{-- <div class="d-flex justify-content-center mt-4">
        {{ $data->links('pagination::bootstrap-5') }}
    </div> --}}
    </div>
</div>



@endsection
