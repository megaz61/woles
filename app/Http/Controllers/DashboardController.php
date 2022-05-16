<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\User;
Use Alert;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(barang $barangs){
        $barangs = barang::paginate(10);
        return view('home',compact('barangs'));
    }
    public function ctlg(barang $barangs){
        $barangs = barang::paginate(10);
        return view('katalog',compact('barangs'));
    }
    public function profile(){
        return view('profile');
    }
    public function editProfil(){
        return view('editProfil');
    }
    public function store(Request $request){
        $user = User::find(Auth::user()->id);
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->nohp = $request->nohp;
        $user->alamat = $request->alamat;
        $user->update();
        return view('Profile');
    }
    /*
    public function dashboard(){
        return view('home');
    }
    */
}
