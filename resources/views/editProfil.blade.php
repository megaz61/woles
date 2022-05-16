
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
            background-color: #1a1a1a;
            color: #1a1a1a;
        }
    </style>
</head>
<body>
<div class="wrapper">
<div><img src="img/WolesLogo.png" width="20%" height="20%" class="" alt=""><p class="h3 d-inline-block align-top"> |     Woles</p></div>
<hr>
<h6 class="txtcenter">Silahkan Edit Akun anda</h6>
@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<!--alert berhasil daftar-->
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<!--alert gagal login-->
@if (session()->has('loginError'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('loginError') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif
<form action="{{url('editProfil')}}" method="post" class="p-3 mt-2">
    @csrf
    <div class="form-field d-flex align-items-center">
        <input type="text" class="form-control form-control-lg" name="nama" placeholder="nama" autofocus
            value="{{auth()->user()->nama}}">
    </div>
    <div class="form-field d-flex align-items-center">
        <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="username" autofocus
            value="{{auth()->user()->username}}">
    </div>
    <div class="form-field d-flex align-items-center">
        <input type="text" class="form-control form-control-lg"  name="email" placeholder="email" autofocus
            value="{{auth()->user()->email}}">
    </div>
    <div class="form-field d-flex align-items-center">
        <input type="text" class="form-control form-control-lg" id="nohp" name="nohp" placeholder="Nomor Telepon" autofocus
            value="{{auth()->user()->nohp}}">
    </div>
    <div class="form-field d-flex align-items-center">
        <input type="text" class="form-control form-control-lg" id="alamat" name="alamat" placeholder="alamat" autofocus
            value="{{auth()->user()->alamat}}">
    </div>
    <button class="btn btn-lg px-5 mt-3" class="btn mt-3" type="submit" name="edit">Submit</button>
</form>
</div>
</body>

</html>
