<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/index.css">
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
    <!--link icon boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
    </style>
    <title>Woles | Pesan</title>
</head>

<body>
    @include('sweetalert::alert')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <a href="{{url('/catalogue')}}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="bi bi-cart"></i> Keranjang</h3>
                        @if(!empty($pesanan))
                        <p align="left">Tanggal Pesan: {{$pesanan->tanggal}}</p>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th>aksi</th>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($pesanan_details as $pesanan_detail )
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>
                                        {{$pesanan_detail->barang->nama_barang}} <br>
                                        <img src="{{url('storage')}}/{{$pesanan_detail->barang->gambar}}" class="center" alt="Card image cap" style="width: 150px; height:150px;">
                                    </td>
                                    <td>{{$pesanan_detail->jumlah}}</td>
                                    <td align="left">Rp. {{number_format($pesanan_detail->barang->harga)}}</td>
                                    <td align="left">Rp. {{number_format($pesanan_detail->jumlah_harga)}}</td>
                                    <td>
                                        <form action="{{url('check-out')}}/{{$pesanan_detail->id}}" method="post">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger btn-sm"  data-toggle="confirmation"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" align="left"><strong>Total Harga</strong></td>
                                    <td align="left">Rp. {{number_format($pesanan->jumlah_harga)}}</td>
                                    <td>
                                        <a href="{{url('konfirmasi-check-out')}}" class="btn btn-success" onclick="return confirm('Anda Yakin akan Check-out barang ?');"><i class="bi bi-cart"></i> checkout</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
