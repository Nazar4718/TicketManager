<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegistrationController extends Controller
{

    public function __construct
    (
        public UserService $userService
    ) {
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('registration');
    }
    /**
     * @param array $request Data from form
     *
     * @return RedirectResponse
     */
    public function store(RegistrationRequest $request)
    {
        $this->userService->create($request);

        return redirect()->route('login.index');
    }
}
