<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama </title>
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- icons boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">
        <div class="container-fluid">
            <img src="{{ asset('image/logo.png') }}" alt="" srcset="" style="height:75px;">
            <!-- <a class="navbar-brand" href="/home">Panda SHOP</a> -->
            <center>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Sneakers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Apparel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Accessories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Trousers</a>
                        </li>
                        <!-- search -->
                        <div class="container-input">
                            <input type="text" placeholder="Search" name="text" class="input">
                            <svg fill="#000000" width="20px" height="20px" viewBox="0 0 1920 1920"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z"
                                    fill-rule="evenodd"></path>
                            </svg>
                        </div>
                        <!-- end search -->
                        <li class="nav-item-barang" style="color:#fff;">
                            <a href="{{ route('logout') }}" class="nav-link"
                                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"
                                {{ __('Logout') }} class="flex items-center px-4 ml-1 py-2 mt-2 text-white-100 ">
                                <p>Logout</p>

                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
            </center>

        </div>
        </div>
    </nav>
    <!-- end navbar -->
    <!-- carousel -->
    <div class="container">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('pkkpp/halaman.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- end carousel -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>STONE ISLAND</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 deskripsi">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, cupiditate. Rem nobis
                                    repudiandae voluptatum iure, expedita illum dolor consequuntur cum quaerat minus
                                    dolores, labore modi porro quas deleniti est officia.</p>
                                <div class="parent">
                                    <button class="button">View More</button>
                                </div>
                            </div>
                            <div class="col-md-6 image">
                                <img src="{{ asset('pkkpp/st.jpeg') }}" alt="" srcset="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- card produk -->
    <center>
        @foreach ($posts as $post)
            <div class="container1">
                <div class="col-md-4">
                    <div class="card" style="width: 12rem;>
        <i class="bi bi-heart"></i>
                        <img src="{{ asset('/storage/posts/' . $post->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <!-- <a href="#" class="btn btn-primary">Obral</a> -->
                            <a href="{{ route('pesan.index', $post->id) }}"><button type="button"
                                    class="btn btn-primary">Obral</button></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </center>
    <!-- end card produk Apparel-->

    <!-- card trousers -->

    <center>
        <div class="judul">
            <h3>Trousers</h3>
        </div>
        @foreach ($trouser as $data)
            <div class="container2">
                <div class="col-md-4">
                    <div class="card" style="width: 12rem;">
                        <img src="{{ asset('/storage/trousers/' . $data->image) }}" class="card-img-top"
                            alt="..">
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->nama_produk }}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </center>

    <!-- end card trousers -->
    <div class="footer mt-5 text-white p-5">
        <img src="{{ asset('image/logo.png') }}" alt="" srcset="">
        <h3>hallo</h3>
    </div>

</body>

</html>
