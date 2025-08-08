<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function store(LoginRequest $request){
        $data = $request->validated();

        if(Auth::attempt($data)){
            return redirect()->route('main.index');
        }
        abort(404);
    }
}
