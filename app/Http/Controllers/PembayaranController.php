<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tagihan = Tagihan::where('status_tagihan','!=',1)->get();
        if (Auth::user()->role_id == 1){
            $data = Pembayaran::All();
        }else{
            $data = Pembayaran::leftJoin('tagihan','tagihan.id_tagihan','=','pembayaran.id_tagihan')->where('id_user',Auth::user()->id)->get();
        }
        return view('pembayaran',compact('data','tagihan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = Pembayaran::where('status_bayar',1)->get();
        return view('laporanPembayaran',compact('data'));
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
        $pembayaran =\DB::table('pembayaran')->get()->last()->id_pembayaran ?? 0;
        $id = $pembayaran + 1;

        if(isset($request->bukti_bayar)){
            $image = $request->bukti_bayar;
            $img_name ='pembayaran_'.$id.'.'.$image->extension();

            $filePath2 = public_path('/app-assets/assets/img/bukti');
            // dd($filePath2);
            $image->move($filePath2, $img_name);

            $data = array(
                'id_pembayaran'=>$id,
                'id_tagihan'=>$request->id_tagihan,
                'total_bayar'=>$request->total_bayar,
                'bukti_bayar'=>'/app-assets/assets/img/bukti/'.$img_name,
                'tgl_bayar'=>$request->tgl_bayar,
                'status_bayar'=>$request->status_bayar,
                'metode_bayar'=>$request->metode_bayar,
            );

            Tagihan::where('id_tagihan',$request->id_tagihan)->update(['status_tagihan'=>1]);
            Pembayaran::create($data);
        }else{
            $data = array(
                'id_pembayaran'=>$id,
                'id_tagihan'=>$request->id_tagihan,
                'total_bayar'=>$request->total_bayar,
                'tgl_bayar'=>$request->tgl_bayar,
                'status_bayar'=>1,
                'metode_bayar'=>0,//manual
            );

            Tagihan::where('id_tagihan',$request->id_tagihan)->update(['status_tagihan'=>2]);
            Pembayaran::create($data);
        }

        return back();



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
        switch ($request->input('action')) {
            case 'edit':
                Pembayaran::find($id)->update($request->all());
                return back();
            break;
            case 'konfirmasi':
                $pembayaran = Pembayaran::find($id);
                Tagihan::where('id_tagihan',$pembayaran->id_tagihan)->update(['status_tagihan'=>2]);
                $pembayaran->status_bayar= 1;
                $pembayaran->save();
                return back();
            break;
        }
    }

    public function konfirmasi(Request $request, $id)
    {
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
        $pembayaran = Pembayaran::find($id);
        Tagihan::where('id_tagihan',$pembayaran->id_tagihan)->update(['status_tagihan'=>0]);
        $pembayaran->delete();
        return back();
    }
}
