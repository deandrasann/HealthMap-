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
                        Website ini merupakan sistem pemantauan gizi anak pada tingkat kabupaten. Website ini terintegrasi dengan
                        dengan website pemantauan gizi anak di tingkat posyandu/puskesmas (NutrTrack). HealthMap mendukung adanya
                        efisiensi pelaporan, pengambilan keputusan berbasis data, dan dukungan untuk anak-anak stunting di tingkat kabupaten.
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
                        <p class="mb-2">Terdeteksi <strong>5 kasus</strong> gizi buruk di <strong>2 posyandu</strong></p>
                        <a href="{{ route('notifikasi') }}"  class="btn btn-primary btn-sm border-dark">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-1 align-items-stretch">
            <!-- Kartu Sambutan dan Statistik -->
            <div class="col-md-5 d-flex align-items-start">
                <div class="card card-custom p-4 h-100 w-100">
                    <p class="text-muted mb-1">Senin, 28 April 2025</p>
                    <h4 class="fw-bold">Selamat Pagi, <span class="text-success">Felisa!</span></h4>
                    <hr>
                    <div class="d-flex align-items-center justify-content-start my-2">
                        <img src="{{asset('images/anak.png')}}" class="me-4">
                        <h3 class="me-4 mb-0">600</h3>
                        <p class="mb-0">Total anak teridentifikasi gizi buruk</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-start my-2">
                        <img src="{{asset('images/talk.png')}}" class="me-4">
                        <h3 class="me-4 mb-0">10</h3>
                        <p class="mb-0">Notifikasi Baru</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-start my-2">
                        <img src="{{asset('images/spot.png')}}" class="me-4">
                        <h3 class="me-4 mb-0">2</h3>
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
                                <span class="me-2 rounded-circle" style="width: 16px; height: 16px; background-color: #0b4f2c;"></span>
                                <span>Gizi Tercukupi</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="me-2 rounded-circle" style="width: 16px; height: 16px; background-color: #e3c133;"></span>
                                <span>Gizi Buruk</span>
                            </div>
                        </div>

                        <!-- Kanan: Chart -->
                        <div style="flex-shrink: 0;">
                            <canvas id="chart" width="250" height="250"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-4">
            <div class="card card-custom p-4 w-100 h-100">
              <h4 class="fw-bold mb-4">Data anak stunting di <span class="text-success">tiap Kecamatan</span></h4>
              <canvas id="stuntingChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('chart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Gizi Tercukupi', 'Gizi Buruk'],
                datasets: [{
                    label: 'Jumlah Anak',
                    data: [80, 20],
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
        const stuntingCtx = document.getElementById('stuntingChart').getContext('2d');
  const stuntingChart = new Chart(stuntingCtx, {
    type: 'bar',
    data: {
      labels: [
        'Ngemplak', 'Godean', 'Ngaglik', 'Depok', 'Berbah', 'Minggir',
        'Seyegan', 'Sleman', 'Pakem', 'Moyudan', 'Mlati', 'Gamping',
        'Tempel', 'Prambanan', 'Kalasan', 'Cangkringan', 'Turi'
      ],
      datasets: [{
        label: 'Jumlah Anak',
        data: [
          85, 60, 65, 40, 100, 60,
          85, 60, 55, 50, 15, 90,
          110, 70, 75, 50, 90
        ],
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
    </script>
@endsection
