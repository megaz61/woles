<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--link CSS -->
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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
  <title>Woles | My Account</title>
</head>
<body>
  @extends('layouts.master')
  @section('content')
  @stop
  @auth
  @else
<ul>
    <li>
        <a href="/login" class="nav-link"></a>
    </li>
</ul>
@endauth
    <!-- menyambungkan ke database user -->
    <?php
    $user = Auth::user();
    $barangs = App\Models\barang::all();
    $penjualan = App\Models\pesanan::all();
    ?>

  <!-- kotak tengah -->
  <div class="container-md-5">
    <div class="content row"  id="about">
        {{-- Profile Menu --}}
        <div class="container">
          <div class="main-body">
                <div class="row gutters-sm">
                  <div class="col-md-4 mb-3 mt-3">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                          <img src="img/profile.jpg" alt="Admin" class="rounded-circle" width="150">
                          <div class="mt-3">
                            <h4>{{auth()->user()->nama}}</h4>
                            <p class="text-secondary mb-1">Customer</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- Detail --}}
                  <div class="col-md-8">
                    <div class="card mb-3 mt-3">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Nama lengkap</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            {{auth()->user()->nama}}
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Username</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            {{auth()->user()->username}}
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              {{auth()->user()->email}}
                            </div>
                          </div>
                          <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Password</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            xxxxxx
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">No. telp</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            {{auth()->user()->nohp}}
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Alamat</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              {{auth()->user()->alamat}}
                            </div>
                          </div>
                          <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <a href="{{url('editProfil')}}" class="buy" style="text-decoration: none;">Edit</a>
                          </div>
                          <div class="col-sm-9 text-secondary">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
       <!-- kotak tengah -->
  <div class="container-md-5">
    <div class="content row"  id="about">
         <!-- konten khusus admin -->
 @if ($user->is_admin == 1)
 {{-- Detail barang --}}
 <div class="">
     <div class="card mb-3 mt-3">
       <div class="card-body">
         <div class="row">
             <div class="col-sm-3">
               <a href="{{url('/upBarang')}}" class="buy" style="text-decoration: none;">Upload Produk</a>
             </div>
             <div class="col-sm-9 text-secondary">
             </div>
           </div>
           <hr>
         <div class="row">
           <div class="col-sm-5">
             <h3 class="mb-0">Barang</h3>
           </div>
         </div>
         <hr>
         <div class="row">
           <div>
               <table class="table table-striped">
                 <thead >
                     <th>Nama Barang</th>
                     <th>Harga</th>
                     <th>Stok</th>
                     <th>Keterangan</th>
                     <th>Aksi</th>
                 </thead>
                 <tbody>
                     @foreach ($barangs as $barang)
                     <tr>
                         <td>{{$barang->nama_barang}}</td>
                         <td>{{$barang->harga}}</td>
                         <td>{{$barang->stok}}</td>
                         <td>{{$barang->keterangan}}</td>
                         <td align="left">
                             <a href="{{url('/editBarang')}}/{{$barang->id}}">Edit</a>
                             <a href="">Hapus</a>
                         </td>
                     </tr>
                     @endforeach
                 </tbody>
               </table>
           </div>
         </div>
         <hr>
       </div>
     </div>
   </div>

 {{-- Detail Pesanan  --}}
 <div class="">
     <div class="card mb-3 mt-3">
       <div class="card-body">
         <div class="row">
           <div class="col-sm-5">
             <h3 class="mb-0">Pesanan</h3>
           </div>
         </div>
         <hr>
         <div class="row">
           <div>
               <table class="table table-striped">
                 <thead >
                     <th>Kode pesanan</th>
                     <th>Tanggal Pesanan</th>
                     <th>Harga Dibayar</th>
                     <th>status</th>
                     <th>Aksi</th>
                 </thead>
                 <tbody>
                     @if(!empty($penjualan))
                        @foreach ($penjualan as $penjualan)
                        <tr>
                            @if ($penjualan->status == 1 or $penjualan->status == 2)
                            <td>{{$penjualan->kode}}</td>
                            <td>{{$penjualan->tanggal}}</td>
                            <td>{{$penjualan->jumlah_harga}}</td>
                                @if ($penjualan->status != 2)
                                    <td>Belum Dibayar</td>
                                    <td><a href="{{url('checkon')}}/{{$penjualan->id}}"><i class="bi bi-check-square-fill"></i></a></td>
                                @else
                                <td>Sudah dibayar</td>
                                <td></td>
                                @endif
                            @endif
                        </tr>
                        @endforeach
                        @endif
                 </tbody>
               </table>
           </div>
         </div>
         <hr>
       </div>
     </div>
   </div>
 </div>
</div>
</div>
</div>
</div>
@endif
    </div>
  </div>

</body>

</html>
