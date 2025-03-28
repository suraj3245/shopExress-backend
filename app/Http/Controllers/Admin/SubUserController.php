<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class SubUserController extends Controller
{
    //
    public function index(){
        $user = User::latest()->get();
        return view('admin.user.index', ['users' => $user]);
    }

    public function create(){
        $roles = Role::get();
        return view('Admin.user.create', ['roles' => $roles]);
    }

    
    public function store(Request $request){
        $validated = $request->validate([
            'name'=> 'required',
            'email' => 'required|email|unique:users',
            'password'=> 'required',
        ]);
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password)
        ]);

        $roleId = intval($request->roles);
        $role = Role::find($roleId);
        if($role){
            $user->syncRoles($role);
        }else{
           // Handle Error
        }
        return redirect()->route('subuser.index')->with('success', 'User Created Successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $role = Role::get();
        $user->roles;
        return view('Admin.user.edit', ['user' => $user, 'roles' => $role]);
    }

    public function update(Request $request, $id){
     
        $user = User::findorFail($id);
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($request->password != null) {
            $request->validate([
                'password' => 'required'
            ]);
            $validated['password'] = bcrypt($request->password);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $validated['password'] ?? $user->password,
        ]);
        $roleId = intval($request->roles); // Convert the role ID to an integer

        $role = Role::find($roleId);
        if ($role) {
            $user->syncRoles($role);
        } else {
            // Handle the error, e.g., return an error response if the role doesn't exist
        }
        return redirect()->route('subuser.index')->withSuccess('User updated !!!');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->withSuccess('user deleted !!!');
    }
}
