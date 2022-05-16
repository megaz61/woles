
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/css/register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
            background-color: #1a1a1a;
            color: #1a1a1a;
        }
    </style>
</head>
<body>
<div class="wrapper mt-5">
    <div><img src="img/WolesLogo.png" width="20%" height="20%" class="" alt=""><p class="h3 d-inline-block align-top"> |     Woles</p></div>
    <hr>
<h6 class="txtcenter">Silahkan buat akun baru</h6>
@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<!--@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
-->
<form action="/register" method="post" class="p-3 mt-3">
    @csrf
    <div class="form-field d-flex align-items-center">
        <input type="text" class="form-control form-control-lg @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama lengkap"
            value="{{ old('nama') }}">
    </div>
    <div class="form-field d-flex align-items-center">
        <input type="text" class="form-control form-control-lg @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username"
            value="{{ old('username') }}">
    </div>
    <div class="form-field d-flex align-items-center">
        <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" placeholder="E-mail"
            value="{{ old('email') }}">
    </div>
    <div class="form-field d-flex align-items-center">
        <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password"
            value="{{ old('password') }}">
    </div>
  <button class="btn btn-lg px-5 mt-3" type="submit" name="signup">Sign Up</button>
</form>
  <p>Already have an account? <a href="/login" class="txtcenter fw-bold">Login</a></p>
</div>
</body>

</html>
