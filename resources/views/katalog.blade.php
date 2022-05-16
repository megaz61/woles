<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
    <link rel="stylesheet" href="katalog.css">
    <style>
    </style>
    <title>Woles | Product Catalog</title>
</head>
<body>
  @extends('layouts.master')
  @section('menuProduct','active')
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
</div>
</body>
</html>
