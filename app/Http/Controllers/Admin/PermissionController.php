<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    //
    public function index()
    {   

        // $permission=Permission::latest()->get();
        $permission = Permission::orderBy('name')->get();

        return view('Admin.permission.index',compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required',
    ]);

    // Create the menu permission
    $menuName = $request->name;

    // Create the base permission for the menu
    $basePermission = Permission::create(['name' => $menuName . '-open']);

    // Create additional permissions for the menu
    $permissions = ['create', 'view', 'edit', 'delete']; // Add more permissions as needed
    foreach ($permissions as $action) {
        Permission::create(['name' => $menuName . '-' . $action]);
    }

    // Assign permissions to the 'admin' role
    $adminRole = Role::where('name', 'admin')->first();
    if ($adminRole) {
        $adminRole->givePermissionTo($basePermission);
        foreach ($permissions as $action) {
            $permission = Permission::where('name', $menuName . '-' . $action)->first();
            if ($permission) {
                $adminRole->givePermissionTo($permission);
            }
        }
    }
        return redirect()->route('permissions.index')->withSuccess('Permission created !!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('Admin.permission.edit',['permission' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    { 

        
        $permission->update(['name'=>$request->name]);
        return redirect()->route('permissions.index')->withSuccess('Permission updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->withSuccess('Permission deleted !!!');
    }

}
