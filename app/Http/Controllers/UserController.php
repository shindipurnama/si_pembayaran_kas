<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\NewUserRegisterNotification;

class UserController extends Controller
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
        $users = User::All();
        // dd($notifications);
        return view('user',compact('notifications','users'));
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
        return view('profile',compact('notifications'));
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
        // dd($request->all());
        $data = array(
            'name'=>$request->name,
            'email'=>$request->email,
            'role_id'=>$request->role_id,
            'alamat'=>$request->alamat,
            'no_tlp'=>$request->no_tlp,
            'role_id'=>$request->role_id,
            'password'=>Hash::make($request->password),
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        );
        User::create($data);
        // $notification = User::latest()->first();
        // $notification->notify(new NewUserRegisterNotification($data));
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
        $user = User::find($id);
        return view('qr-data',compact('user'));

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
        if(isset($request->foto)){
            $image = $request->foto;
            // dd($request->foto);
            $img_name ='user_'.$id.'.'.$image->extension();

            $filePath2 = public_path('/app-assets/assets/img/users');
            // dd($filePath2);
            $image->move($filePath2, $img_name);
            if(isset($request->password)){
                $data = array(
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'alamat'=>$request->alamat,
                    'no_tlp'=>$request->no_tlp,
                    'password'=>Hash::make($request->password),
                    'qr_code'=>'/app-assets/assets/img/users/'.$img_name,
                );
            }else{
                $data = array(
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'alamat'=>$request->alamat,
                    'no_tlp'=>$request->no_tlp,
                    'qr_code'=>'/app-assets/assets/img/users/'.$img_name,
                );
            }
            User::find($id)->update($data);
        }else{
            if(isset($request->password)){
                $data = array(
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'alamat'=>$request->alamat,
                    'no_tlp'=>$request->no_tlp,
                    'password'=>Hash::make($request->password),
                );
            }else{
                $data = array(
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'alamat'=>$request->alamat,
                    'no_tlp'=>$request->no_tlp,
                );
            }
            User::find($id)->update($data);

        }

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
        User::find($id)->delete();
        return back();
    }
}
