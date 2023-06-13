<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(5);

        return view('admin.user.index', compact('users'));
    }
    public function create(){
        return view('admin.user.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,user',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('admin.user.index');
    }

    public function show(User $user){
        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user){
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,user',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role
        ]);

        return redirect()->route('admin.user.index');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
