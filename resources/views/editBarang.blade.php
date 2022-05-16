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
    <link rel="stylesheet" href="/css/index.css">
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
    <!--alert berhasil daftar-->
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="col-md-12 mt-4">
    <form action="{{route('upBarang.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Nama Barang</label>
            <input type="text" class="form-control"  @error('nama') is-invalid @enderror name="nama_barang" id="nama_barang" placeholder="Masukkan Nama Barang" autofocus
            value="{{ old('nama_barang') }}">
        </div>
        <div class="form-group">
            <label for="">Harga Barang</label>
            <input type="text" class="form-control"  @error('harga') is-invalid @enderror name="harga" id="harga" placeholder="Contoh 27000" autofocus
            value="{{ old('harga') }}">
        </div>
        <div class="form-group">
            <label for="">stok Barang</label>
            <input type="text" class="form-control"  @error('stok') is-invalid @enderror name="stok" id="stok" placeholder="Masukkan stok Barang" autofocus
            value="{{ old('stok') }}">
        </div>
        <div class="form-group">
            <label for="">Keterangan Barang</label>
            <input type="text" class="form-control"  @error('keterangan') is-invalid @enderror name="keterangan" id="keterangan" placeholder="Masukkan Keterangan Barang" autofocus
            value="{{ old('keterangan') }}">
        </div>
        <!--
        <div class="form-group">
            <label for="">Gambar Barang</label>
            <input type="file" class="form-control"  @error('gambar') is-invalid @enderror name="gambar" id="gambar" placeholder="Masukkan Gambar Barang">
        </div>
    -->
        <br>
        <div class="row">
            <div class="col-sm-3">
              <form action="{{url('updateBarang')}}/{{$barang->id}}" method="post">
                <button type="submit" class="btn buy">Submit</button>
            </form>
            </div>
            <div class="col-sm-9 text-secondary">
            </div>
          </div>
        <br>
    </form>
</div>
    </div>
  </div>
  <div class="main">
</div>
</body>
</html>
