<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
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

        $role = Role::create(['name' => $request->role]);

        $this->appLog(
            $request->route()->getName(),
            'CREATED',
            'Role ID #' . $role->id . ' created'
        );

        return redirect(route('roles.index'))->with('message', 'Role created successfully!');

    }

    public function edit(Role $role)
    {

        return view('roles.edit', [
            'role' => Role::findOrFail($role->id),
            'users' => User::all()
        ]);

    }

    public function update(RoleRequest $request, Role $role)
    {
        
        $request->validated();

        $role = Role::where('id', $role->id)->update(['name' => $request->role]);

        $this->appLog(
            $request->route()->getName(),
            'UPDATED',
            'Role ID #' . $role->id . ' updated'
        );
        
        return redirect(route('roles.index'))->with('message', 'Role updated successfully!');

    }

    public function destroy(Request $request, Role $role)
    {

        $role = Role::findOrFail($role->id);

        $role->delete();

        $this->appLog(
            $request->route()->getName(),
            'DELETED',
            'Role ID #' . $role->id . ' deleted'
        );

        return redirect(route('roles.index'))->with('message', 'Role deleted successfully!');

    }

}
