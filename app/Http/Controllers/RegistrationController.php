<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{

    public function __construct(public UserService $userService)
    {
    }
    public function index()
    {
        return view('registration');
    }
    public function store(RegistrationRequest $request)
    {
        $this->userService->create($request);
        return redirect()->route('login.index');
    }
}
