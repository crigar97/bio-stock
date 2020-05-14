<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
      return view('users.profile', [
        'user' => auth()->user(),
        'collaborators' => User::where('role_id', Role::COLLABORATOR)->get(),
      ]);
    }

    public function create()
    {
      //
    }

    public function store(UserRequest $userRequest)
    {
      $collaborator = new User();
      $collaborator->name = $userRequest->get('name');
      $collaborator->role_id = Role::COLLABORATOR;
      $collaborator->email = $userRequest->get('email');
      $collaborator->email_verified_at = now();
      $collaborator->password = bcrypt($userRequest->get('password'));
      $collaborator->save();
      return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
      $user->delete();
      return redirect()->route('users.index');
    }
}
