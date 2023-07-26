<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Users;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Exception;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('superadmin');
        $user = Users::latest();
        $search = \request('search') ?? '';
        if ($search != ''){
            $user->where('name','like', $search)
                ->orWhere('username','like', $search)
                ->orWhere('email','like',$search);
        }
        return view('users', [
            'data'=> $user->paginate(10),
            'data_role'=> Role::all()
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $this->authorize('superadmin');
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
        $this->authorize('superadmin');
        $user = Users::findOrFail($id);

        return view('users.show', compact('user'));
    }

     public function edit($id)
    {
        $this->authorize('superadmin');
        $user = Users::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('superadmin');
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
        $this->authorize('superadmin');
        try {
            $user = Users::findOrFail($id);
            $user->delete();

            return redirect('/users')->with('success', 'User deleted successfully.');
        }catch (ModelNotFoundException $e){
            return redirect('/users')->with(['error' => 'Data not found']);
         }
    }
}
