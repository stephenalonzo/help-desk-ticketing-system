<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\UserRequest;
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

    public function update(UserRequest $userRequest, RoleRequest $roleRequest, User $user)
    {
        
        $userRequest->validated();

        User::where('id', $user->id)->update([
            'name'  => $userRequest->name,
            'email' => $userRequest->email
        ]);

        $roleRequest->validated();

        $user = User::findOrFail($user->id);

        $user->syncRoles($roleRequest->role);
        
        return redirect(route('users.index'))->with('message', 'User updated successfully!');

    }

}
