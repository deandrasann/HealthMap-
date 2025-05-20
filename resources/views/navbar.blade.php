<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HealthMap</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/x-icon" href="{{asset('images/healthmap-logo.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container-fluid overflow-hidden">
        <div class="row overflow-auto">
            <!-- Sidebar -->
            <div class="col-12 col-sm-3 col-xl-2 px-sm-2 p-2 bg-light d-flex sticky-top border-end">
                <div class="d-flex flex-sm-column flex-row flex-grow-1 align-items-start align-items-sm-center px-2 px-sm-3 pt-2 vh-100">
                    <!-- Logo -->
                    <a href="/" class="d-flex align-items-center pb-sm-3 mb-md-0 me-md-auto text-decoration-none">
                        <span class="fs-5">
                            <img src="{{ asset('images/healthmap-logo.png') }}" class="img-fluid">
                            <span class="d-none d-sm-inline ms-2 fw-bold" style="color: #27391C">Health<span class="fw-bold" style="color: #000000">Map</span></span>
                        </span>
                    </a>

                    <!-- Menu Items -->
                    <ul class="nav nav-pills flex-sm-column flex-row flex-wrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center justify-content-sm-center align-items-center align-items-sm-center gap-1 w-100 px-2" id="menu">
                        <!-- Button Edit Profile -->
                        <li class="nav-item w-100">
                            {{-- <a href="#" class="nav-link">
                                <img src="{{asset('images/profile.jpg')}}" class="img-fluid w-50 h-50 d-none d-sm-inline ms-1">

                            </a> --}}
                            <a href="#" class="d-flex flex-column align-items-center text-white text-decoration-none">
                                <!-- Gambar Desktop -->
                                <img src="{{ asset('images/profile.jpg') }}"
                                     class="rounded img-fluid d-none d-lg-block"
                                     style="width: 150px; height: auto;">


                                <!-- Gambar Mobile -->
                                <img src="{{ asset('images/profile.jpg') }}"
                                     class="rounded img-fluid d-lg-none"
                                     style="width: 40px; height: auto;">

                                <!-- Nama hanya muncul di desktop -->
                            </a>
                        </li>
                        <h5 class="fw-bold my-2">Felisa</h5>

                        <!-- Button Edit Profile -->
                        <li class="nav-item w-100">
                            <a href="{{ route('profil') }}" class="w-100 nav-link p-1 p-sm-2 px-sm-4 btn btn-primary border border-dark border-2 fw-bold {{ request()->routeIs('profil') ? 'active' : '' }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <span class="d-none d-sm-inline ms-1">Edit Profil</span>
                            </a>
                        </li>

                        <li class="nav-item w-100" >
                            <a href="{{ route('home') }}" class="w-100 nav-link p-1 p-sm-2 px-sm-4 btn btn-primary border border-dark border-2 fw-bold {{ request()->routeIs('home') ? 'active' : '' }}">
                                <i class="fa-solid fa-chart-line"></i>
                                <span class="d-none d-sm-inline ms-1">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item w-100" >
                            <a href="{{ route('data-anak') }}" class="w-100 nav-link p-1 p-sm-2 px-sm-4 btn btn-primary border border-dark border-2 fw-bold {{ request()->routeIs('data-anak') ? 'active' : '' }}">
                                <i class="fa-solid fa-user"></i>
                                <span class="d-none d-sm-inline ms-1">Data Anak</span>
                            </a>
                        </li>

                        <li class="nav-item w-100">
                            <a href="{{ route('data-kecamatan') }}" class="w-100 nav-link p-1 p-sm-2 px-sm-4 btn btn-primary border border-dark border-2 fw-bold {{ request()->routeIs('data-kecamatan') ? 'active' : '' }}">
                                <i class="fa-solid fa-map"></i>
                                <span class="d-none d-sm-inline ms-1">Data Wilayah</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Logout Button -->
                    <div class="mt-auto py-4 w-100 d-flex justify-content-center w-100">
                        <a href="#" class="nav-link p-1 p-sm-2 px-sm-4 btn btn-primary border border-dark border-2 fw-bold w-100">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span class="d-none d-sm-inline ms-1">Log Out</span>
                        </a>
                    </div>
                </div>
            </div>
                    <!-- Main Content -->
            <div class="col d-flex flex-column h-sm-100 ">
                <main class="row overflow-auto">
                    <div class="content col pt-4 vh-100">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>
</html>
