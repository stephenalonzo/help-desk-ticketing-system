@extends('layout')

@section('content')
<div class="bg-white border border-gray-400 rounded-md">
    <div class="bg-gray-200 p-3 rounded-t-md">Edit user</div>
    <div class="p-4">
        <form action="{{ route('users.update', $user->id) }}" method="post" class="w-full mx-auto grid grid-flow-row gap-6">
            @csrf
            @method('PATCH')
            <div class="flex flex-col justify-between w-full">
                <label for="" class="font-semibold">Name</label>
                <input type="text" name="name" id="" class="rounded-md border border-gray-400" value="{{ $user->name }}">
            </div>
            <div class="flex flex-col justify-between w-full">
                <label for="" class="font-semibold">Email</label>
                <input type="text" name="email" id="" class="rounded-md border border-gray-400" value="{{ $user->email }}">
            </div>
            <div class="flex flex-row items-start space-x-16">
                <div class="flex flex-col space-y-2">
                    <label for="" class="font-semibold">Assign Role</label>
                    @foreach ($roles as $role)
                        <div class="flex flex-row items-center space-x-4">
                            <input type="checkbox" name="role[]" value="{{ $role->name }}" {{ $user->hasRole($role->name) == true ? 'checked' : '' }} id="" class="border border-gray-400">
                            <span>{{ ucfirst($role->name) }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="flex flex-col items-start space-y-2">
                    <label for="" class="font-semibold">Assign Permission</label>
                    @foreach ($permissions as $permission)
                        <div class="flex flex-row items-center space-x-4">
                            <input type="checkbox" name="permission[]" value="{{ $permission->name }}" {{ $user->hasPermissionTo($permission->name) == true ? 'checked' : '' }} id="" class="border border-gray-400">
                            <span>{{ ucfirst($permission->name) }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="px-4 py-2 rounded-md bg-green-700 text-white w-36">Save Changes</button>
        </form>
    </div>
</div>
@endsection