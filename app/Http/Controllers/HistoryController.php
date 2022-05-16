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

class HistoryController extends Controller
{
    public function index(){
        $pesanans = pesanan::where('user_id',Auth::user()->id)->where('status','!=',0)->get();
        return view('pesan.history',compact('pesanans'));
    }
    public function detail($id){
        $pesanan = pesanan::where('id',$id)->first();
        $pesanan_details = pesananDetails::where('pesanan_id',$pesanan->id)->get();
        return view('pesan.historyDetail',compact('pesanan','pesanan_details'));
    }
    public function bukti(Request $request,$id){
        //mengambil data file yg diupload
        $berkas=$request->file('gambar');
        //mengambil nama file yang diupload
        $nama_berkas=$berkas->getClientOriginalName();
        //memindahkan file ke folder public/img
        $berkas->move('storage/bukti', $berkas->getClientOriginalName());

        $pesanan = pesanan::where('id',$id)->first();
        $pesanan_details = pesananDetails::where('pesanan_id',$pesanan->id)->get();
        $pesanan->gambar = $nama_berkas;
        $pesanan->save();
        dd($pesanan);
        Alert::success('Bukti Pembayaran Berhasil Diupload', 'Success');
    }
}
