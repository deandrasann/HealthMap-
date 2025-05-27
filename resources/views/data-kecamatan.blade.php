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
        <table class="table table-striped align-middle" id="kec-data-table">
            <thead>
                <tr>
                    <th id="id">ID</th>
                    <th id="kec_name">Kecamatan</th>
                    <th class="text-center" id="child_sum">Total Anak</th>
                    <th class="text-center" id="child_mal">Total Anak Malnutrition</th>
                    <th class="text-center" id="detail_data">Data Nutrisi</th>
                </tr>
            </thead>
            <tbody>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {

        const token = localStorage.getItem('token');
        const tbody = $('#kec-data-table tbody');


        if(token){
            $.ajax({
                url: 'http://127.0.0.1:8000/api/healthmap/malnutrition/kecamatan',
                type: 'GET',
                headers: {
                'Authorization': 'Bearer ' + token
                },
                success: function(response) {
                    console.log(response.data)
                    if (response.data) {
                        tbody.empty();
                        response.data.forEach(item => {
                            const row = `
                                <tr>
                                    <td>${item.id}</td>
                                    <td>${item.kecamatan_name}</td>
                                    <td class="text-center">${item.total_children}</td>
                                    <td class="text-center">${item.malnourished_children}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-outline-success btn-sm">Lihat Data</a>
                                    </td>
                                </tr>`;
                            tbody.append(row);
                        });
                    }
                },
                    error: function(xhr) {
                }
            });
        }
    })
</script>



@endsection
