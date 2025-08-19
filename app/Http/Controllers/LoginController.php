<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LoginController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        return view('login');
    }

    /**
     * @param array $request Data from form
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws NotFoundHttpException
     */
    public function store(LoginRequest $request)
    {
        $data = $request->validated();

        if (Auth::attempt($data)){
            return redirect()->route('main.index');
        }

        abort(404);
    }
}
