<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function ajaxr()
    {
        return view('ajax');
    }
    public function allUser()
    {
        $users = User::orderBy('id','desc')->get();
        return response()->json($users);
    }

    public function userPost(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'address'   => 'required',
            'phone'     => 'required',
            'email'     => 'required',
            'password'  => 'required',
        ]);
        $data = User::create([
            'name'      => $request->name,
            'address'   => $request->address,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'password'  => $request->password
        ]);
        return response()->json($data);
    }

}
