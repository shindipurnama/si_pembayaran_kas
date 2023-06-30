<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Tagihan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // if(auth()->user()->role_id == 2){
        //     $belumKonfirmasi = Pembayaran::leftJoin('tagihan','tagihan.id_tagihan','=','pembayaran.id_tagihan')->where(['id_user'=>Auth::user()->id,'status_bayar'=>0])->count('id_pembayaran');
        //     $totalBayar = Pembayaran::leftJoin('tagihan','tagihan.id_tagihan','=','pembayaran.id_tagihan')->where(['id_user'=>Auth::user()->id,'status_bayar'=>1])->sum('total_bayar');
        //     $totalTagihan = Tagihan::where(['status_tagihan'=>0,'id_user'=>Auth::user()->id])->sum('jumlah');
        // }else{
        //     $totalTagihan = Tagihan::where('status_tagihan',0)->sum('jumlah');
        //     $belumKonfirmasi = Pembayaran::where('status_bayar',0)->count('id_pembayaran');
        //     $totalBayar = Pembayaran::where('status_bayar',1)->sum('total_bayar');
        // }
        // $user = User::where(['role_id'=>2,'status_user'=>NULL])->count('id');
        // return view('dashboard', compact('belumKonfirmasi','totalTagihan','totalBayar','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
