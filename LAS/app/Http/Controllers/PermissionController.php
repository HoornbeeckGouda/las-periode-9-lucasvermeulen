<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
class PermissionController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
                     
            new Middleware('permission:users', only: ['index', 'create', 'store', 'edit', 'update', 'destroy']),
        ];
    }
    public function index()
    {
        $presions = Permission::all();
        return view('role-permission.permission.index', ['permissions' => $presions]);
    }
    public function create()
    {
        return view('role-permission.permission.create');
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'unique:permissions, name'],
        // ]);
        Permission::create([
            'name' => $request->name
        ]);
        return redirect('permissions')->with('success', 'Permission created successfully');
    }
    public function edit(Permission $permission )
    {
        
        return view('role-permission.permission.edit', ['permission' => $permission]);
    }
    public function update(Request $request,Permission $permission )
    {   

        $permission->update([
            'name' => $request->name
        ]);
        return view('permissions')->with('success', 'Permission created successfully');
    }
    public function delete($permissionId)
    {
        $permission = Permission::find($permissionId);
        $permission->delete();
        return redirect('permissions/')->with('success', 'Permission created successfully');
    }

}
