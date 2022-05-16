<!DOCTYPE html>
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
    <link rel="stylesheet" href="katalog.css">
  <title>Woles.</title>
</head>
<body>
  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/WolesLogo.png" width="5%" height="5%" class="d-inline-block align-top" alt="">   |  Woles</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link @yield('menuHome')" href="/" >Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @yield('menuProduct')" href="/catalogue">Product</a>
              </li>
              @auth
              <li class="nav-item">
                <?php
                  $pesanan_utama = \App\Models\pesanan::where('user_id', auth()->user()->id)->where('status',0)->first();
                  if(!empty($pesanan_utama)){
                    $notif = \App\Models\pesananDetails::where('pesanan_id',$pesanan_utama->id)->count();
                  }
                  ?>
              <a class="nav-link" href="{{url('check-out')}}">
                  <i class="bi bi-cart"></i>
                  @if(!empty($notif))
                  <span class="position-absolute top-1 translate-middle badge rounded-pill bg-danger">
                    {{$notif}}
                  </span>
                  @endif
              </a>
            </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Selamat Datang, {{auth()->user()->nama}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/userprofile"><i class="bi bi-person-bounding-box"></i> My Account</a>
                  <a class="dropdown-item" href="{{url('/history')}}"><i class="bi bi-layout-text-sidebar-reverse"></i> Riwayat Pemesanan</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#contact"><i class="bi bi-chat-dots"></i> Contact Us</a>
                  <form action="/logout" method="post">
                    @csrf
                      <button type="submit" class="dropdown-item">
                        <i class="bi bi-box-arrow-left"></i> Logout
                      </button>
                    </form>
                </div>
              </li>
              @else
              <li class="nav-item">
                <a class="nav-link" href="/login"><i class="bi bi-box-arrow-right"></i> Login</a>
              </li>
              @endauth
            </ul>
          </div>
        </div>
      </nav>
      {{-- Content Product --}}
      @section('menuProduct','active')
      @section('content')

      <!--
          <ul class="cards">
            <li class="cards_item">
              <div class="card">
                <div class="card_image card-img-top "><img src="img/imboost.jpg" class="center" alt="Card image cap" style="width: 200px; height:200px;"></div>
                <div class="card_content">
                  <h2 class="card_title">Multivitamin</h2><hr>
                  <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
                  <button class="buy">Beli sekarang!</button>
                </div>
              </div>
            </li>
            <li class="cards_item">
              <div class="card">
                <div class="card_image card-img-top "><img src="img/oksigen.jpg" class="center" alt="Card image cap" style="width: 200px; height:200px;"></div>
                <div class="card_content">
                  <h2 class="card_title">Oksigen</h2><hr>
                  <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
                  <button class="buy">Beli sekarang!</button>
                </div>
              </div>
            </li>
            <li class="cards_item">
              <div class="card">
                <div class="card_image card-img-top "><img src="img/handstz.jpg" class="center" alt="Card image cap" style="width: 200px; height:200px;"></div>
                <div class="card_content">
                  <h2 class="card_title">Hand Sanitizer</h2><hr>
                  <p class="card_text">Demo of pixel perfect pure CSS simple responsive Hand Sanitizer</p>
                  <button class="buy">Beli sekarang!</button>
                </div>
              </div>
            </li>
          </ul>
          </div>
        </div>
    -->
        @show
        {{-- Footer --}}
        <div class="footer">
          <div class="container">
              <div class="row">
                  <div class="col-md-4">
                      <h3>Woles</h3><hr>
                      <p>
                          <img src="img/um2.png" width="8%" class="d-inline-block">   Teknik Informatika UM
                      </p>
                  </div>
                  <div class="col-md-4">
                      <h3>Contact Us</h3><hr>
                      <div class="" id="contact">
                          <div class="">
                            <button type="button" class="btn-pesan" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Kirim Pesan</button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Kritik & Saran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nama:</label>
                                <input type="text" class="form-control" id="recipient-name">
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Komentar:</label>
                                <textarea class="form-control" id="message-text"></textarea>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class=" btn-primary">Kirim Pesan</button>
                          </div>
                        </div>
                      </div>
                    </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <h3>Follow Us</h3><hr>
                      <ul>
                          <li>Facebook</li>
                          <li>Instagram</li>
                          <li>YouTube</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </body>
</html>
