<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    
    public function index()
    {

        $permissions = Permission::all();

        return view('permissions.index', compact('permissions'));

    }

    public function create()
    {

        return view('permissions.create');

    }

    public function edit(Permission $permission)
    {

        $permission = Permission::findOrFail($permission->id);

        return view('permissions.edit', compact('permission'));

    }

    public function update(PermissionRequest $request, Permission $permission)
    {

        $request->validated();

        Permission::where('id', $permission->id)->update(['name' => $request->permission]);

        return redirect(route('permissions.index'))->with('message', 'Permission updated successfully!');
        
    }

}
