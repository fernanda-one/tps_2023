<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('users', [
            'data'=> Users::paginate(10),
            'data_role'=> Role::all()
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:3',
            'username' => 'required|string|max:255|min:3|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'img_url' => 'nullable|string',
            'password' => 'required|string|min:6|max:255',
            'role_id'=>'required|integer'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        Users::create($validatedData);

        return redirect('/users')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $user = Users::findOrFail($id);

        return view('users.show', compact('user'));
    }

     public function edit($id)
    {
        $user = Users::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:6|confirmed',
            'password_confirmation' => 'nullable|string|min:6',
            'role_id' => 'nullable|integer',
        ]);
        $user = Users::findOrFail($id);
        if ($validatedData['password'] !== null)
        {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }else{
            Arr::forget($validatedData, 'password');
        }
        $user->update($validatedData);

        return redirect('/users')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = Users::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
