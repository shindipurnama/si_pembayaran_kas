<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tagihan;
use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Notifications\NewTagihanNotification;
use App\Events\NewTagihan;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = auth()->user()->unreadNotifications;
        $users = User::where('role_id',2)->get();
        $tagihan = DB::table('tagihan')->get()->last()->id_tagihan ?? 0;
        $id = $tagihan + 1;

        if (Auth::user()->role_id == 1){
            $data = Tagihan::All();
        }else{
            $data = Tagihan::where('id_user',Auth::user()->id)->get();
        }

        $totalBlmBayar = Tagihan::where('id_user', Auth::user()->id)->where('status_tagihan',0)
                ->sum('jumlah');
        $totalBlmKonfrim = Tagihan::where('id_user', Auth::user()->id)->where('status_tagihan',1)
                ->sum('jumlah');
        $totalKonfrim = Tagihan::where('id_user', Auth::user()->id)->where('status_tagihan',2)
                ->sum('jumlah');
        $jmlhBlmBayar = Tagihan::where('id_user', Auth::user()->id)->where('status_tagihan',0)
                ->count('id');
        $jmlhBlmKonfrim = Tagihan::where('id_user', Auth::user()->id)->where('status_tagihan',1)
                ->count('id');
        $jmlhKonfrim = Tagihan::where('id_user', Auth::user()->id)->where('status_tagihan',2)
                ->count('id');

        return view('tagihan',compact('notifications','users','id','data','totalBlmBayar','totalBlmKonfrim','totalKonfrim','jmlhBlmBayar','jmlhBlmKonfrim','jmlhKonfrim'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $notifications = auth()->user()->unreadNotifications;
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();
        $data = Tagihan::whereBetween('tgl_tagihan', [$startDate, $endDate])->get();
        $totalBlmBayar = Tagihan::whereBetween('tgl_tagihan', [$startDate, $endDate])->where('status_tagihan',0)
                ->sum('jumlah');
        $totalBlmKonfrim = Tagihan::whereBetween('tgl_tagihan', [$startDate, $endDate])->where('status_tagihan',1)
                ->sum('jumlah');
        $totalKonfrim = Tagihan::whereBetween('tgl_tagihan', [$startDate, $endDate])->where('status_tagihan',2)
                ->sum('jumlah');
        $jmlhBlmBayar = Tagihan::whereBetween('tgl_tagihan', [$startDate, $endDate])->where('status_tagihan',0)
                ->count('id');
        $jmlhBlmKonfrim = Tagihan::whereBetween('tgl_tagihan', [$startDate, $endDate])->where('status_tagihan',1)
                ->count('id');
        $jmlhKonfrim = Tagihan::whereBetween('tgl_tagihan', [$startDate, $endDate])->where('status_tagihan',2)
                ->count('id');

        return view('laporanTagihan',compact('notifications','data','totalBlmBayar','totalBlmKonfrim','totalKonfrim','startDate','endDate','jmlhBlmBayar','jmlhBlmKonfrim','jmlhKonfrim'));
    }

    public function report(Request $request)
    {
        //
        $notifications = auth()->user()->unreadNotifications;
        $startDate =  Carbon::createFromFormat('Y-m-d', $request->input('start'))??Carbon::now()->startOfMonth();
        $endDate = Carbon::createFromFormat('Y-m-d', $request->input('end'))??Carbon::now()->endOfMonth();
        $data = Tagihan::whereBetween('tgl_tagihan', [$startDate, $endDate])->get();
        $totalBlmBayar = Tagihan::whereBetween('tgl_tagihan', [$startDate, $endDate])->where('status_tagihan',0)
                ->sum('jumlah');
        $totalBlmKonfrim = Tagihan::whereBetween('tgl_tagihan', [$startDate, $endDate])->where('status_tagihan',1)
                ->sum('jumlah');
        $totalKonfrim = Tagihan::whereBetween('tgl_tagihan', [$startDate, $endDate])->where('status_tagihan',2)
                ->sum('jumlah');
        $jmlhBlmBayar = Tagihan::whereBetween('tgl_tagihan', [$startDate, $endDate])->where('status_tagihan',0)
                ->count('id');
        $jmlhBlmKonfrim = Tagihan::whereBetween('tgl_tagihan', [$startDate, $endDate])->where('status_tagihan',1)
                ->count('id');
        $jmlhKonfrim = Tagihan::whereBetween('tgl_tagihan', [$startDate, $endDate])->where('status_tagihan',2)
                ->count('id');
        return view('laporanTagihan',compact('notifications','data','totalBlmBayar','totalBlmKonfrim','totalKonfrim','startDate','endDate','jmlhBlmBayar','jmlhBlmKonfrim','jmlhKonfrim'));
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

        Tagihan::create($request->all());
        $notification = Tagihan::where('id_tagihan',$request->id_tagihan)->first();

        event(new NewTagihan($tagihan = $notification));
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
        Tagihan::find($id)->update($request->all());
        return back();
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
        Tagihan::find($id)->delete();
        return back();
    }
}
