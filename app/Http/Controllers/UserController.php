<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $user;
    public function __construct(
      UserRepositoryInterface $user)
    {
       $this->user = $user;
    }

    public function show($id)
    {
       return $this->user->with('reviews')->find($id);
    }

    public function store(UserRequest $request)
    {
      $request['password'] = Hash::make($request['password']);
      return $this->user->create($request->all());
    }

    public function destroy($id)
    {
       return $this->user->delete($id);
    }
}