<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    
    public function index()
    {

        $users = User::all();

        return view('users.index', compact('users'));

    }

    public function edit(User $user)
    {

        return view('users.edit', [
            'user' => User::findOrFail($user->id),
            'roles' => Role::all(),
            'permissions' => Permission::all()
        ]);

    }

    public function update(RoleRequest $request, User $user)
    {
        
        $request->validated();

        $user->syncRoles($request->role);
        
        return redirect(route('users.index'))->with('message', 'Role updated successfully!');

    }

}
