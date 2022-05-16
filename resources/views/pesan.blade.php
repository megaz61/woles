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
    <style>
        body {
    background: #c6ffdd;
    background: -webkit-linear-gradient(
        to left,
        #f7797d,
        #fbd786,
        #c6ffdd
    );
    background: linear-gradient(
        to left,
        #f7797d,
        #fbd786,
        #c6ffdd
    );
}
    </style>
  <title>Woles</title>
</head>
<body>
    @include('sweetalert::alert')
    <div class="container" >
        <div class="row" >
            <div class="col-md-8 mt-4">
                <a href="{{url('/catalogue')}}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Kembali</a>
                <br>
                <br>
            </div>
            <div class="col-md-12 mt-4">
                <div class="card " id="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{url('storage')}}/{{$barang->gambar}}" alt="" class="rounded mx-auto d-block"
                                    width="500px">
                            </div>
                            <div class="col-md-6 mt-4">
                                <br>
                                <h3>{{$barang->nama_barang}}</h3>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Harga </td>
                                            <td>:</td>
                                            <td colspan="2" align="left">Rp. {{number_format($barang->harga) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Stock </td>
                                            <td>:</td>
                                            <td colspan="2" align="left">{{$barang->stok }}</td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan </td>
                                            <td>:</td>
                                            <td colspan="2" align="left">{{$barang->keterangan }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pesan </td>
                                            <td>:</td>
                                            <td>
                                                <form action="{{url('pesan')}}/{{$barang->id}}" method="post">
                                                    @csrf
                                                    <input type="text" name="jumlah_pesan" class="form-control"
                                                        placeholder="Jumlah Dipesan" required="">
                                                    <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-cart"></i>Masukkan Keranjang</button>
                                                    <br>
                                                    <br>
                                                    <br>
                                            </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
