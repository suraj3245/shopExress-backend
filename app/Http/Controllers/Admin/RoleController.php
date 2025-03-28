<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Menu;

class RoleController extends Controller
{
    //
    public function index()
    {
        $rolesWithPermissions = Role::with('permissions')->latest()->get();
        return view('Admin.roles.index', ['rolesWithPermissions' => $rolesWithPermissions]);
    } 

    public function edit(Role $role)
    {
        $permission = Permission::get();
        $role->permissions;
       return view('Admin.roles.edit',['role'=>$role,'permissions' => $permission]);
    }

    public function update(Request $request, Role $role)
    { 
      
        $role->update(['name'=>$request->name]);
        $permissionIds = $request->permissions;

        // Find permission models from these IDs
        $permissions = Permission::whereIn('id', $permissionIds)->get();
    
        // Use 'pluck' to extract just the names from the permission models
        $permissionNames = $permissions->pluck('name');
    
        // Sync permissions with the role using permission names
        $role->syncPermissions($permissionNames);
        // $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index')->withSuccess('Role updated !!!');
    }

   
    public function create()
    {
        $permissions = Permission::get();
        $menus=Menu::all();
        return view('Admin.roles.create',['permissions'=>$permissions],compact('menus'));
    }

    public function store(Request $request)
    {  
   
       
        $request->validate(['name'=>'required']);
        $existingRole = Role::where('name', $request->name)->first();

        if ($existingRole) {
            return redirect()->back()->with('error', 'The Role Name already exists');
        }

        $role = Role::create(['name'=>$request->name]);

        $role->syncPermissions($request->permissions);
        
        return redirect()->route('roles.index')->withSuccess('Role created !!!');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->withSuccess('Role deleted !!!');
    }

}
