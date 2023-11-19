@extends('layout')

@section('content')
<div class="bg-white border border-gray-400 rounded-md">
    <div class="bg-gray-200 p-3 rounded-t-md">Edit role</div>
    <div class="p-4">
        <form action="{{ route('roles.update', $role->id) }}" method="post" class="w-full mx-auto grid grid-flow-row gap-6">
            @csrf
            @method('PATCH')
            <div class="flex flex-col justify-between w-full">
                <label for="" class="font-semibold">Role</label>
                <input type="text" name="role" id="" class="rounded-md border border-gray-400" value="{{ $role->name }}">
            </div>
            <button type="submit" class="px-4 py-2 rounded-md bg-green-700 text-white w-36">Save Changes</button>
        </form>
    </div>
</div>
@endsection