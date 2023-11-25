<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
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

    public function update(Request $request, UserRequest $userRequest, RoleRequest $roleRequest, PermissionRequest $permissionRequest, User $user)
    {
        
        $userRequest->validated();

        User::where('id', $user->id)->update([
            'name'  => $userRequest->name,
            'email' => $userRequest->email
        ]);

        $roleRequest->validated();

        $user = User::findOrFail($user->id);

        $user->syncRoles($roleRequest->role);

        $permissionRequest->validated();

        $user = User::findOrFail($user->id);

        $user->syncPermissions($permissionRequest->permission);

        $this->appLog(
            $request->route()->getName(),
            'UPDATED',
            'User ID #' . $user->id . ' profile has been updated'
        );
        
        return redirect(route('users.index'))->with('message', 'User updated successfully!');

    }

}
