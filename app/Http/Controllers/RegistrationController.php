<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index(){
        return view('registration');
    }
    public function store(RegistrationRequest $request){
        $data = $request->validated();
        User::create([
           'name' => $data['name'],
           'email' => $data['email'],
           'password' => Hash::make($data['password']),
           'last_name' => $data['last_name'],
           'role' => 'user'
        ]);
        return redirect()->route('login.index');
    }
}
