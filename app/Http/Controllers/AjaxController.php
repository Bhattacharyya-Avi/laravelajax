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

}
