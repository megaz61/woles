<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--link icon boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="index.css">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
  <title>Woles</title>
</head>
<body>
  @extends('layouts.master')
  @section('content')
  @auth
  @else
  <ul>
    <li>
        <a href="/login" class="nav-link"></a>
    </li>
  </ul>
  @endauth
  @section('menuHome','active')
  <!-- kotak tengah -->
  <div class="container-md-5">
    <div class="content row"  id="about">
      <!-- side kiri -->
      <div class="col-md-6 left txt_center">
        <h1 class="display-6">
          Selamat datang di website kami
        </h1>
        <h1 class="primary-color"><b>Woles.</b></h1><hr>
        <figure>
          <blockquote class="blockquote text-muted">
            <p>"Waktu dan kesehatan adalah dua aset berharga yang tidak dikenali dan hargai sampai keduanya hilang." - Denis Waitley</p>
          </blockquote>
        </figure>
      </div>
      <!-- side kanan -->
      <div class="col-md-6 right">
        <!--Carousel-->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/gejala.jpg" class="d-block w-100" alt="..." style="opacity: 90%;">
            </div>
            <div class="carousel-item">
              <img src="img/hands.jpg" class="d-block w-100" alt="..." style="opacity: 85%;">
            </div>
            <div class="carousel-item">
              <img src="img/scan.webp" class="d-block w-100" alt="..." style="opacity: 80%;">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="main">
    <h1 class="txt_center display-6">Product Catalogue</h1>
    <ul class="cards">
  @foreach ($barangs as $barang )
    <li class="cards_item">
        <div class="card">
          <div class="card_image card-img-top "><img src="{{url('storage')}}/{{$barang->gambar}}" class="center" alt="Card image cap" style="width: 200px; height:200px;"></div>
          <div class="card_content">
            <h2 class="card_title">{{$barang->nama_barang}}</h2><hr>
            <p class="card_text">
                <strong>Harga: </strong>Rp.{{number_format($barang->harga)}}<br>
                <strong>Stok: </strong>{{$barang->stok}}<br>
                <hr>
                <strong>Keterangan: </strong><br>
                {{$barang->keterangan}} <br>
            </p>
            <a href="{{url('pesan/'.$barang->id)}}" class="buy" class="btn btn-primary"><i class="bi bi-cart"></i> Masukkan Keranjang</a>
          </div>
        </div>
      </li>
  @endforeach
</ul>
</div>
</body>
</html>
