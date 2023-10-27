<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Trousers </title>
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/trousers.css') }}">
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
            <a href="/home"><img src="{{ asset('image/logo.png') }}" alt="" srcset=""
                    style="height:75px;"></a>
            <!-- <a class="navbar-brand" href="/home">Panda SHOP</a> -->
            <center>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('sepatu.index') }}">Sneakers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('apparel.home') }}">Apparel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('useraksesoris.index')}}">Accessories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('usertrousers.index')}}">Trousers</a>
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
    
    <!-- footer start -->
    <div class="footer  bg-dark text-white p-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 logo-perusahaan">
                    <img src="{{ asset('image/logo.png') }}" alt="" srcset="">
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
