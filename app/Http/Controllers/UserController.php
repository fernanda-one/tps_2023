<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

//        return view('users.index', compact('users'));
        return response()->json($users);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'img_url' => 'nullable|string',
            'password' => 'required|string|min:6',
            'salt' => 'nullable|string',
            'status' => 'nullable|string',
            'role_id' => 'required|integer',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'img_url' => $request->img_url,
            'password' => bcrypt($request->password),
            'salt' => $request->salt,
            'status' => $request->status,
            'role_id' => $request->role_id,
        ]);
        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'img_url' => 'nullable|string',
            'password' => 'nullable|string|min:6',
            'salt' => 'nullable|string',
            'status' => 'nullable|string',
            'role_id' => 'required|integer',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->img_url = $request->img_url;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->salt = $request->salt;
        $user->status = $request->status;
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
