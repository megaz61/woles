<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;

class BarangController extends Controller {
    public function create() {
        return view('/upBarang');
    }

    public function store(Request $request) {
        //https://www.sahretech.com/2021/01/cara-membuat-upload-file-ke-database.html
        //dd($request->all());
        $validatedData=$request->validate([ 'nama_barang'=> 'required|max:255',
            'harga'=> 'required|max:255',
            'stok'=> 'required|max:255',
            'gambar'=> 'required',
            'keterangan'=> 'required'
            ]);
        //mengambil data file yg diupload
        $file=$request->file('gambar');
        //mengambil nama file yang diupload
        $nama_file=$file->getClientOriginalName();
        //memindahkan file ke folder public/img
        $file->move('storage', $file->getClientOriginalName());

        //upload ke database
        $barang=new barang;
        $barang->nama_barang=$request->nama_barang;
        $barang->harga=$request->harga;
        $barang->stok=$request->stok;
        $barang->gambar=$nama_file;
        $barang->keterangan=$request->keterangan;
        $barang->save();

        return redirect()->back()->with('success', 'Produk anda berhasil di tambahkan');
    }

    /*
    public function index(barang $barang) {
        $barang = barang::all();
        return view('/index', compact('barang'));
    }
    */

    /*edit barang*/

    public function editBarang($id) {
        $barang = barang::find($id);
        return view('/editBarang', compact('barang'));
    }
    public function updateBarang(Request $request, $id) {
        $barang = barang::find($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->keterangan = $request->keterangan;
        $barang->save();
        return redirect('/userprofile');
        Alert::success('Success', 'Data berhasil diubah');
    }

}
