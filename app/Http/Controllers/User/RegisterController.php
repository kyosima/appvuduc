<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Auth::guard('web')->check()){
            return view('dangky');
        }
        return redirect('/');      
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'fullname'=>'required',
            'identitycard'=>'required|unique:users',
            'email'=>'required|email|unique:users',
            'phonenumber1'=>'required|unique:users',
            'phonenumber2'=>'required|unique:users',
            'tinhthanhpho'=>'required',
            'quanhuyen'=>'required',
            'xaphuongthitran'=>'required',
            'diachi'=>'required',
            'username'=>'required|unique:users',
            'password'=>'required|confirmed|min:5|max:12',
            'referrallink'=>'required|unique:users'
        ]);
        $user = User::create([
            'fullname'        => $request['fullname'],
            'identitycard'    => $request['identitycard'],
            'email'           => $request['email'],
            'phonenumber1'    => $request['phonenumber1'],
            'phonenumber2'    => $request['phonenumber2'],
            'tinhthanhpho'    => $request['tinhthanhpho'],
            'quanhuyen'       => $request['quanhuyen'],
            'xaphuongthitran' => $request['xaphuongthitran'],
            'diachi'          => $request['diachi'],
            'username'        => $request['username'],
            'referrallink'    => $request['referrallink'],
            'password'        => Hash::make($request['password']),
        ]);
        Auth::guard('web') -> login($user);
        return redirect('/');
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
