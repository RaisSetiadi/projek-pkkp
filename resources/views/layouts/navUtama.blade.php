<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama </title>
    <!-- css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- icons boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <!-- navbar -->
<nav class="navbar navbar-expand-lg bg-body-white">
  <div class="container-fluid">
  <img src="{{asset('image/logo.png')}}" alt="" srcset="" style="height:75px;">
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
  <svg fill="#000000" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
    <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
    </svg>
    </div>
    <!-- end search -->
        <li class="nav-item-barang" style="color:#fff;">
          <a class="nav-link " aria-current="page" href="#">Logout</a>
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
      <img src="{{asset('pkkpp/halaman.jpg')}}" class="d-block w-100" alt="...">
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

    <!-- card produk -->
    <div class="container"> 
      <div class="row">
      <h2>Sneakers</h2>
     <div class="card">  
       <div class="imgBx">  
         <img src="http://pngimg.com/uploads/running_shoes/running_shoes_PNG5782.png" alt="nike-air-shoe">  
       </div>  
       <div class="contentBx">  
         <h2>Nike Shoes</h2>  
         <div class="size">  
           <h3>Size :</h3>  
           <span>7</span>  
           <span>8</span>  
           <span>9</span>  
           <span>10</span>  
         </div>  
         <div class="color">  
           <h3>Color :</h3>  
           <span></span>  
           <span></span>  
           <span></span>  
         </div>  
         <a href="#">Buy Now</a>  
       </div>  
     </div>
     <div class="card">  
       <div class="imgBx">  
         <img src="{{asset('image/converse1.png')}}" alt="nike-air-shoe">  
       </div>  
       <div class="contentBx">  
         <h2>Nike Shoes</h2>  
         <div class="size">  
           <h3>Size :</h3>  
           <span>7</span>  
           <span>8</span>  
           <span>9</span>  
           <span>10</span>  
         </div>  
         <div class="color">  
           <h3>Color :</h3>  
           <span></span>  
           <span></span>  
           <span></span>  
         </div>  
         <a href="#">Buy Now</a>  
       </div>  
     </div>    
   </div>
   </div>   

  <!-- card produk 2 -->
  <div class="container">  
      <h2>Sneakers</h2>
 
   </div>  
   <!-- end card produk -->
</body>
</html>