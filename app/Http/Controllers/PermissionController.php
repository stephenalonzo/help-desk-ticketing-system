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

    public function store(PermissionRequest $request)
    {

        $request->validated();

        $permission = Permission::create(['name' => $request->permission]);

        $this->appLog(
            $request->route()->getName(),
            'CREATED',
            'Permission ID #' . $permission->id . ' created'
        );

        return redirect(route('permissions.index'))->with('message', 'Permission created successfully!');

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

    public function destroy(Request $request, Permission $permission)
    {

        $permission = Permission::findOrFail($permission->id);

        $permission->delete();

        $this->appLog(
            $request->route()->getName(),
            'DELETED',
            'Permission ID #' . $permission->id . ' deleted'
        );

        return redirect(route('permissions.index'))->with('message', 'Permission deleted successfully!');

    }

}
