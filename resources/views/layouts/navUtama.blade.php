<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama </title>
    <link rel="website icon" type="png" href="{{asset('image/logoPi.jpeg')}} ">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- icons boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">
        <div class="container-fluid">
            <a href="/home"><img src="{{ asset('image/logoPi.jpeg') }}" alt="" srcset="" style="height:100px; margin-left:20px;"></a>
            <!-- <a class="navbar-brand" href="/home">Panda SHOP</a> -->
            <center>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('sepatu.index')}}">Sneakers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('pakaian.home')}}">Pakaian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('userBarangbekas.index')}}">Barang Second</a>
                        </li>
                        <li class="nav-item">

                            <a class="nav-link active" aria-current="page" href="{{route('userMakanan.index')}}">Makanan</a>
                        </li>

                        <!-- search -->
                        <!-- <form action="{{ route('layouts.cari') }}" method="GET" class="mt-3 mx-auto max-w-xl py-2 px-6 rounded-full bg-white border flex focus-within:border-gray-300 ">
                            <input type="text" name="cari" placeholder="Cari Produk" value="{{ old('cari') }}" class="bg-transparent w-full focus:outline-none pr-4 font-semibold border-0 focus:ring-0 px-0 py-0">
                            <button class="btn btn-primary" value="search" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>

                        </form> -->
                        <form action="{{ route('layouts.cari') }}" method="GET">
                            <div class="container-input">
                                <input type="text" placeholder="Search" name="cari" class="input" value="{{ old('cari') }}">
                                <span class="icon">
                                    <svg width="19px" height="19px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path opacity="1" d="M14 5H20" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path opacity="1" d="M14 8H17" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M21 11.5C21 16.75 16.75 21 11.5 21C6.25 21 2 16.75 2 11.5C2 6.25 6.25 2 11.5 2" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path opacity="1" d="M22 22L20 20" stroke="#000" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                </span>
                                <button class="btn btn-primary" value="search" type="submit">
                                    <!-- <i class="fas fa-search fa-sm"></i> -->
                                </button>

                            </div>
                        </form>

                        <!-- end search -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pesan.checkout') }}"><i class="bi bi-cart-plus" style="font-size: 20px; margin-left:20px;"></i><span class="badge bg-secondary"></span></h1></a>
                        </li>
                        <li class="nav-item dropdown" style="margin-right: 150px; height:50px; width:20px;">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Dashboard</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li> <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();" {{ __('Logout') }} class="flex items-center px-4 ml-1 py-2 mt-2 text-white-100 ">
                                        <p>Logout</p>

                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
            </center>

        </div>
        </div>
    </nav>
    <!-- end navbar -->
    <!-- carousel -->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('pkkpp/halaman.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('pkkpp/halamanSepatu.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('pkkpp/halaman.jpg')}}" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
    <!-- end carousel -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4><b>STONE ISLAND</b></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 deskripsi">
                                <p>bLorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, cupiditate. Rem nobis repudiandae voluptatum iure, expedita illum dolor consequuntur cum quaerat minus dolores, labore modi porro quas deleniti est officia.</p>
                                <div class="parent">
                                    <button class="button">View More</button>
                                </div>
                            </div>
                            <div class="col-md-3 image">
                                <img src="{{asset('pkkpp/st.jpeg')}}" alt="" srcset="">
                            </div>
                            <div class="col-md-3 content">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora architecto, culpa corrupti saepe veritatis unde, eum sunt quis labore quo itaque voluptatibus, beatae consequuntur soluta? At reprehenderit dolorum totam veniam.</p>
                                <div class="parents">
                                    <button class="button">View More</button>
                                </div>
                            </div>
                            <div class="col-md-3 image">
                                <img src="{{asset('pkkpp/st.jpeg')}}" alt="" srcset="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- card produk -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 mb-3 judul-sneakers">
                <h5>Sneakers</h5>
            </div>
            @foreach($sneaker as $data)
            <div class="col-md-3 mt-3 mb-3 sneakers">
                <div class="card">
                    <img src="{{ asset('/storage/sneakers/'.$data->image) }}" alt="">
                    <a href="{{ route('pesan.sneakers',$data->id) }}"><button type="button" class="button">Obral</button></a>
                    <div class="card-body">
                        <h5 class="card-title">{{$data->nama_produk}}</h5>
                        <p class="card-text">RP {{$data->harga}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- end card produk sneaker-->

    <!-- card Makanan dan Minuman -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 mb-3">
                <h5>Makanan Dan Minuman</h5>
            </div>
            @foreach($trouser as $data)
            <div class="col-md-3 mt-3 mb-3 trousers">
                <div class="card">
                    <a href="{{route('pesan.makanan',$data->id)}}"><img src="{{ asset('/storage/trousers/'.$data->image) }}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">{{$data->nama_produk}}</h5></a>
                        <p class="card-text">RP {{$data->harga}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- end card makanan dan minuman -->

    <!-- card pakaian -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 mb-3 judul-sneakers">
                <h5>Pakaian</h5>
            </div>
            @foreach($posts as $post)
            <div class="col-md-3 mt-3 mb-3 trousers">
                <div class="card">
                    <a href="{{route('pesan.pakaian',$post->id)}}"><img src="{{ asset('/storage/posts/'.$post->image) }}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">{{$post->nama_produk}}</h5></a>
                        <p class="card-text">RP {{$post->harga}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- end card pakaian -->

    <!-- card barang bekas -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 mb-3 judul-barangbekas">
                <h5>Barang Bekas</h5>
            </div>
            @foreach($aksesoris as $data)
            <div class="col-md-3 mt-3 mb-3 barangbekas">
                <div class="card">
                    <a href="{{route('pesan.barangbekas',$data->id)}}"><img src="{{ asset('/storage/aksesoris/'.$data->image) }}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title">{{$data->nama_produk}}</h5></a>
                        <p class="card-text">RP {{$data->harga}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- end card barang bekas -->


    <!-- footer start -->
    <div class="footer mt-5 bg-dark text-white p-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 logo-perusahaan">
                    <img src="{{asset('image/buat.png')}}" style="width:100px ; height:130px; margin-left:80px; margin-top:30px;" alt="" srcset="">
                </div>
                <div class="col-md-2">
                    <h2 class="fw-bold">Test</h2>
                    <ul class="list-group list-unstyled">
                        <li class="list-item mt-3 mb-3">
                            Faq
                        </li>
                        <li class="list-item mb-3">
                            Privacy
                        </li>
                        <li class="list-item mb-3">
                            Payment Confirmation
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h2 class="fw-bold">Customers Cars</h2>
                    <ul class="list-group list-unstyled">
                        <li class="list-item mt-3 mb-3">
                            Contact Us
                        </li>
                        <li class="list-item mb-3">
                            Faqs
                        </li>
                        <li class="list-item mb-3">
                            Return&Exchanges
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h2 class="fw-bold">My Account</h2>
                    <ul class="list-group list-unstyled">
                        <li class="list-item mt-3 mb-3">
                            Sign In/Register
                        </li>
                        <li class="list-item mb-3">
                            My Wishlist
                        </li>
                        <li class="list-item mb-3">
                            My Cart
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-down  text-white py-4">
        <div class="container-fluid">
            <div class="col-md-5">
                <div class="copyright">
                    &copy; 2023 <strong>Copyright</strong> Website Ecommarce
                </div>
            </div>
        </div>
        <!-- end footer  -->


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>