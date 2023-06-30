<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Tagihan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role_id == 2){
            $belumKonfirmasi = Pembayaran::leftJoin('tagihan','tagihan.id_tagihan','=','pembayaran.id_tagihan')->where(['id_user'=>Auth::user()->id,'status_bayar'=>0])->count('id_pembayaran');
            $totalBayar = Pembayaran::leftJoin('tagihan','tagihan.id_tagihan','=','pembayaran.id_tagihan')->where(['id_user'=>Auth::user()->id,'status_bayar'=>1])->sum('total_bayar');
            $totalTagihan = Tagihan::where(['status_tagihan'=>0,'id_user'=>Auth::user()->id])->sum('jumlah');
        }else{
            $totalTagihan = Tagihan::where('status_tagihan',0)->sum('jumlah');
            $belumKonfirmasi = Pembayaran::where('status_bayar',0)->count('id_pembayaran');
            $totalBayar = Pembayaran::where('status_bayar',1)->sum('total_bayar');
        }
        $user = User::where(['role_id'=>2,'status_user'=>NULL])->count('id');
        return view('dashboard',compact('belumKonfirmasi','totalTagihan','totalBayar','user'));
    }
}
