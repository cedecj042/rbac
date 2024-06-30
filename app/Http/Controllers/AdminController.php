<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function manageUsers()
    {
        // $users = User::select('id','name','email')->get();
        $users = User::with('roles')->select('id', 'name', 'email')->get();
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.manageUsers')->with(compact('users', 'roles'));
    }

    public function editUser($id)
    {
        $user = User::with('roles')->select('id', 'name', 'email')->find($id);
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.editusers')->with(compact('user', 'roles', 'permissions'));
    }
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id
        ]);
    
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
    

        // Sync roles
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('usertool')->with('success', 'User updated successfully');
    }
}
