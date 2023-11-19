<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    
    public function index()
    {

        $roles = Role::all();

        return view('roles.index', compact('roles'));

    }

    public function create()
    {

        return view('roles.create');

    }

    public function store(RoleRequest $request)
    {

        $request->validated();

        Role::create(['name' => $request->role]);

        return redirect(route('roles.index'))->with('message', 'Role created successfully!');

    }

    public function edit(Role $role)
    {

        return view('roles.edit', [
            'role' => Role::findOrFail($role->id)
        ]);

    }

    public function update(RoleRequest $request, Role $role)
    {
        
        $request->validated();

        Role::where('id', $role->id)->update(['name' => $request->role]);
        
        return redirect(route('roles.index'))->with('message', 'Role updated successfully!');

    }

    public function destroy(Role $role)
    {

        $roles = Role::findOrFail($role->id);

        $roles->delete();

        return redirect(route('roles.index'))->with('message', 'Role deleted successfully!');

    }

}
