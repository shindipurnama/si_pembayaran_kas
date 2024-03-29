<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Events\NewKonfirmasi;
use App\Events\NewUserBayar;

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
        $notifications = auth()->user()->unreadNotifications;
        $tagihan = Tagihan::where('status_tagihan','!=',1)->get();
        $startDate =  Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();
        if (Auth::user()->role_id == 1){
            $data = Pembayaran::All();
        }else{
            $data = Pembayaran::leftJoin('tagihan','tagihan.id_tagihan','=','pembayaran.id_tagihan')->where('id_user',Auth::user()->id)->get();
        }

        $total = Pembayaran::leftJoin('tagihan','tagihan.id_tagihan','=','pembayaran.id_tagihan')->where('id_user',Auth::user()->id)
                ->sum('total_bayar');
        return view('pembayaran',compact('notifications','data','tagihan','total','startDate','endDate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $notifications = auth()->user()->unreadNotifications;
        $startDate =  Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();
        $data = Pembayaran::where('status_bayar',1)->whereBetween('tgl_bayar', [$startDate, $endDate])->get();
        $total = Pembayaran::where('status_bayar',1)->whereBetween('tgl_bayar', [$startDate, $endDate])
                ->sum('total_bayar');
        return view('laporanPembayaran',compact('notifications','data','total','startDate','endDate'));
    }
    
    public function report(Request $request)
    {
        //
        $notifications = auth()->user()->unreadNotifications;
        $startDate =  Carbon::createFromFormat('Y-m-d', $request->input('start'))??Carbon::now()->startOfMonth();
        $endDate = Carbon::createFromFormat('Y-m-d', $request->input('end'))??Carbon::now()->endOfMonth();
        $data = Pembayaran::where('status_bayar',1)->whereBetween('tgl_bayar', [$startDate, $endDate])->get();
        $total = Pembayaran::where('status_bayar',1)->whereBetween('tgl_bayar', [$startDate, $endDate])
                ->sum('total_bayar');
        return view('pembayaran',compact('notifications','data','total','startDate','endDate'));
    }

    public function filter(Request $request)
    {
        //
        $notifications = auth()->user()->unreadNotifications;
        $tagihan = Tagihan::where('status_tagihan','!=',1)->get();
        $startDate =  Carbon::createFromFormat('Y-m-d', $request->input('start'))??Carbon::now()->startOfMonth();
        $endDate = Carbon::createFromFormat('Y-m-d', $request->input('end'))??Carbon::now()->endOfMonth();
        $data = Pembayaran::leftJoin('tagihan','tagihan.id_tagihan','=','pembayaran.id_tagihan')
                ->where('id_user',Auth::user()->id)
                ->whereBetween('tgl_bayar', [$startDate, $endDate])->get();
        
        $total = Pembayaran::leftJoin('tagihan','tagihan.id_tagihan','=','pembayaran.id_tagihan')->where('id_user',Auth::user()->id)
                ->whereBetween('tgl_bayar', [$startDate, $endDate])
                ->sum('total_bayar');
        return view('pembayaran',compact('notifications','data','total','startDate','endDate','tagihan'));
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
                'metode_bayar'=>$request->metode_bayar ?? 2,
            );

            Tagihan::where('id_tagihan',$request->id_tagihan)->update(['status_tagihan'=>1]);
            Pembayaran::create($data);            
            $notification= Tagihan::where('id_tagihan',$request->id_tagihan)->first();
            event(new NewUserBayar($tagihan = $notification));
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

                $notification= Tagihan::where('id_tagihan',$pembayaran->id_tagihan)->first();
                event(new NewKonfirmasi($tagihan = $notification));
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
