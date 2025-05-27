@extends('navbar')
@section('content')
<div class="container">
    <div class="row g-4 align-items-stretch">
        <!-- Card 1: HealthMap -->
        <div class="col-md-8 d-flex">
            <div class="card card-custom p-4 h-100 w-100">
                <div class="d-flex align-items-center mb-2">
                    <img src="{{ asset('images/healthmap-logo.png') }}" alt="Logo" class="icon-large me-4">
                    <h4 class="m-0 fw-bold">HealthMap</h4>
                </div>
                <p class="mb-0 text-justify">
                    Website ini merupakan sistem pemantauan gizi anak pada tingkat kabupaten. Website ini terintegrasi
                    dengan
                    dengan website pemantauan gizi anak di tingkat posyandu/puskesmas (NutrTrack). HealthMap mendukung
                    adanya
                    efisiensi pelaporan, pengambilan keputusan berbasis data, dan dukungan untuk anak-anak stunting di
                    tingkat kabupaten.
                </p>
            </div>
        </div>

        <!-- Card 2: Notifikasi -->
        <div class="col-md-4 d-flex">
            <div class="card card-custom p-4 h-100 w-100 d-flex flex-row align-items-center">
                <div class="me-3">
                    <img src="{{ asset('images/notif.png') }}" alt="Notifikasi" style="width: 80px;">
                </div>
                <div class="text-start flex-grow-1">
                    <h3 class="fw-bold">Notifikasi</h3>
                    <p class="mb-2">Terdeteksi <strong><span id="sum-cases"></span></strong> <strong>kasus</strong> gizi buruk di <strong><span id="sum-unit"></span></strong> <strong>posyandu</strong></p>
                    <a href="{{ route('notifikasi') }}" class="btn btn-primary btn-sm border-dark">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-1 align-items-stretch">
        <!-- Kartu Sambutan dan Statistik -->
        <div class="col-md-5 d-flex align-items-start">
            <div class="card card-custom p-4 h-100 w-100">
                <p class="text-muted mb-1" id="date-now"></p>
                <h4 class="fw-bold">Selamat Pagi, <span class="text-success" id="username"></span></h4>
                <hr>
                <div class="d-flex align-items-center justify-content-start my-2">
                    <img src="{{asset('images/anak.png')}}" class="me-4">
                    <h3 class="me-4 mb-0" id="sum-mal-data"></h3>
                    <p class="mb-0">Total anak teridentifikasi gizi buruk</p>
                </div>
                <div class="d-flex align-items-center justify-content-start my-2">
                    <img src="{{asset('images/talk.png')}}" class="me-4">
                    <h3 class="me-4 mb-0" id="new-notif"></h3>
                    <p class="mb-0">Notifikasi Baru</p>
                </div>
                <div class="d-flex align-items-center justify-content-start my-2">
                    <img src="{{asset('images/spot.png')}}" class="me-4">
                    <h3 class="me-4 mb-0" id="new-unit"></h3>
                    <p class="mb-0">Data wilayah terupdate</p>
                </div>
            </div>
        </div>

        <div class="col-md-7 d-flex">
            <div class="card card-custom p-4 h-100 w-100 align-items-center">
                <div class="d-flex justify-content-center w-100">
                    <!-- Kiri: Judul, Dropdown, dan Legenda -->
                    <div class="me-4" style="flex: 1;">
                        <h4 class="fw-bold">Data Kasus Gizi Buruk</h4>
                        <p class="text-success fw-semibold mb-1">di Kabupaten Sleman</p>
                        <div class="d-flex align-items-center mb-2">
                            <span class="me-2 rounded-circle"
                                style="width: 16px; height: 16px; background-color: #0b4f2c;"></span>
                            <span>Gizi Tercukupi</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="me-2 rounded-circle"
                                style="width: 16px; height: 16px; background-color: #e3c133;"></span>
                            <span>Gizi Buruk</span>
                        </div>
                    </div>

                    <!-- Kanan: Chart -->
                    <div style="flex-shrink: 0;">
                        <canvas id="sumChart" width="250" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-4">
        <div class="card card-custom p-4 w-100 h-100">
            <h4 class="fw-bold mb-4">Data anak malnutrition di <span class="text-success">tiap Kecamatan</span></h4>
            <canvas id="stuntingChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {

        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const today = new Date();
        const formattedDate = today.toLocaleDateString('id-ID', options);

        document.getElementById('date-now').textContent = formattedDate;

        const token = localStorage.getItem('token');

        if (token) {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/healthmap/nutrition-record/summary',
                type: 'GET',
                headers: {
                'Authorization': 'Bearer ' + token
                },
                success: function(response) {
                    $('#sum-mal-data').text(response.data['Gizi Buruk']['Jumlah Anak']);
                    sumData = response.data;
                    sumChartData = {
                        labels: ['Gizi Buruk', 'Gizi Baik'],
                        data: [
                            sumData['Gizi Buruk']['Jumlah Anak'],
                            sumData['Gizi Tercukupi']['Jumlah Anak']
                        ],
                    }

                    console.log(sumData);
                    console.log(sumChartData);

                    renderSumChart(sumChartData);
                },
                    error: function(xhr) {
                }
            });

            $.ajax({
                url: 'http://127.0.0.1:8000/api/healthmap/malnutrition/kecamatan',
                type: 'GET',
                headers: {
                'Authorization': 'Bearer ' + token
                },
                success: function(response) {
                    console.log(response.data)
                    malNutritionData = response.data;

                    const labels = malNutritionData.map(item => item.kecamatan_name);
                    const data = malNutritionData.map(item => item.malnourished_children);

                    malChartData = {
                        labels: labels,
                        data: data
                    }

                    console.log(malNutritionData);
                    console.log(malChartData);

                    renderMalChart(malChartData);
                },
                    error: function(xhr) {
                }
            });


            $.ajax({
                url: 'http://127.0.0.1:8000/api/healthmap/malnutrition',
                type: 'GET',
                headers: {
                'Authorization': 'Bearer ' + token
                },
                success: function(response) {
                    total_cases = response.total_malnutrition_cases;
                    total_unit = response.data.total;
                    $('#new-notif').text(total_cases);
                    $('#sum-cases').text(total_cases);
                    $('#sum-unit').text(total_unit);
                    $('#new-unit').text(total_unit);
                },
                    error: function(xhr) {
                }
            });
        } else {
        console.warn('Token not found.');
        }

        function renderSumChart(chartData){
            const ctx = document.getElementById('sumChart').getContext('2d');
                const chart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: chartData.labels,
                        datasets: [{
                            label: 'Jumlah Anak',
                            data: chartData.data,
                            backgroundColor: ['#0b4f2c', '#e3c133'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: false,
                        plugins: {
                            legend: { display: false }
                        }
                    }
                });
        }

        function renderMalChart(chartData){
            const stuntingCtx = document.getElementById('stuntingChart').getContext('2d');
            const stuntingChart = new Chart(stuntingCtx, {
                type: 'bar',
                data: {
                labels: chartData.labels,
                datasets: [{
                    label: 'Jumlah Anak',
                    data: chartData.data,
                    backgroundColor: '#0b4f2c',
                    borderRadius: 6,
                    barPercentage: 0.8,
                }]
                },
                options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 30
                    }
                    },
                    x: {
                    ticks: {
                        maxRotation: 45,
                        minRotation: 30,
                        autoSkip: false
                    }
                    }
                },
                plugins: {
                    legend: {
                    display: false
                    }
                }
                }
            });
        }
    })
</script>
@endsection
