<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function __construct(public User $model)
    {
    }

    public function create($request)
    {
        $data = $request->validated();
        return $this->model->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'last_name' => $data['last_name'],
            'role' => 'user'
        ]);
    }
}
