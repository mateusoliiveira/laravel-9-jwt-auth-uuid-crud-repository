<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\UserRepositoryInterface;

class AuthController extends Controller
{
    protected $user;
    public function __construct(
      UserRepositoryInterface $user)
    {
       $this->user = $user;
    }

    public function login(AuthRequest $request)
    {   
        $token = $request->authedToken();
        $user = $request->authedUser();
        return response()->json([
                'message' => 'Usuário logado',
                'user' => $user,
                'token' => $token,
            ]);
    }

    public function logout(AuthRequest $request)
    {
       $request->authedLogout();
    }

    public function me(AuthRequest $request)
    {
        return response()->json([
            'user' => $request->authedUser(),
        ], 200);
    }

    public function refresh(AuthRequest $request)
    {
        return response()->json([
            'status' => 'success',
            'user' => $request->authedUser(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

}