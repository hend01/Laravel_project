<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

class UserrController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.users', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $user->update(['role' => $request->input('role')]);
        $users = User::all();
        return view('admin.user.users', compact('users'));
    }
}
