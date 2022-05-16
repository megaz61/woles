<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\pesanan;
use App\Models\User;
use App\Models\pesananDetails;
use Carbon\Carbon;
Use Alert;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index($id){
        $barang = barang::find($id);
        return view('/pesan',compact('barang'));
    }
    public function pesan(Request $request,$id){
        $barang = barang::find($id);
        $tanggal = Carbon::now();

        //cek validasi stok
        if($request->jumlah_pesan > $barang->stok){
            return back();
        }

        //cek validasi
        $cek_pesanan = pesanan::where('user_id',Auth::user()->id)->where('status','0')->first();

        //simpan ke database pesanan
        if(empty($cek_pesanan)){
            $pesanan = new pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal =$tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(100,999);
            $pesanan->save();
        }

        // membuat pesanan id
        $pesanan_baru = pesanan::where('user_id',Auth::user()->id)->where('status', 0)->first();

        //cek pesanan detail
        $cek_pesanan_detail = pesananDetails::where('barang_id',$barang->id)->where('pesanan_id',$pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail)){
            //simpan ke database pesanan_detail
            $pesanan_detail = new pesananDetails;
            $pesanan_detail->barang_id = $barang->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan+$pesanan_detail->jumlah;
            $pesanan_detail->jumlah_harga = $barang->harga*$request->jumlah_pesan;
            $pesanan_detail->save();

        }
        else{
            $pesanan_detail = pesananDetails::where('pesanan_id',$pesanan_baru->id)->where('barang_id',$id)->first();
            $pesanan_detail->jumlah = $request->jumlah_pesan+$pesanan_detail->jumlah;

            //harga skrg
            $harga_pesanan_detail_baru = $barang->harga*$request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        //jumlah total
        $pesanan = pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        $pesanan->jumlah_harga =$pesanan->jumlah_harga+$barang->harga*$request->jumlah_pesan;
        $pesanan->update();

        return back()->with('success', 'Barang dimasukkan ke Keranjang');
    }
    public function check_out() {
        $pesanan = pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        if(!empty($pesanan)){
            $pesanan_details = pesananDetails::where('pesanan_id',$pesanan->id)->get();
            return view('pesan.checkout',compact('pesanan','pesanan_details'));
        }
        else{
            return view('pesan.checkout');
        }

    }
    public function delete($id){
        $pesanan_detail = pesananDetails::where('id',$id)->first();
        $pesanan = pesanan::where('id',$pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();
        Alert::toast('Pesanan Berhasil Dihapus', 'Toast Type');
        return redirect('/check-out');
    }
    public function konfirmasi(){
        $user = User::where('id',Auth::user()->id)->first();

        if(empty($user->alamat)){
            Alert::error('Gagal', 'Lengkapi Identitas Anda Terlebih Dahulu');
            return redirect('/check-out');
        }

        if(empty($user->nohp)){
            Alert::error('Gagal', 'Lengkapi Identitas Anda Terlebih Dahulu');
            return redirect('/check-out');
        }

        $pesanan = pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status=1;
        $pesanan->update();

        $pesanan_details = pesananDetails::where('pesanan_id',$pesanan_id)->get();
        foreach($pesanan_details as $pesanan_detail){
            $barang = barang::find($pesanan_detail->barang_id);
            $barang->stok = $barang->stok - $pesanan_detail->jumlah;
            $barang->update();
        }

        Alert::success('Pesanan Berhasil Di checkout', 'Silahkan Cek Riwayat Pemesanan anda');
        return redirect('/check-out');
    }
    public function checkon($id){
        $pesanan = pesanan::where('id',$id)->first();
        $pesanan->status=2;
        $pesanan->update();
        return redirect('/userprofile');
        Alert::success('Berhasil Di Konfirmasi', 'Pesanan Sudah Di Konfirmasi telah Di Bayar');
    }
}
