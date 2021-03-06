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
            'password'  => bcrypt($request->password)
        ]);
        return response()->json($data);
    }

    public function userEdit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->update([
                'name'      => $request->name,
                'address'   => $request->address,
                'phone'     => $request->phone,
                'email'     => $request->email,
                'password'  => bcrypt($request->password),
            ]);
            return response()->json($user);
        }

    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();
        }
        return response()->json($user);
    }

}
