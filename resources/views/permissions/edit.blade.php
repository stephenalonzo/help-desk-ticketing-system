@extends('layout')

@section('content')
<div class="bg-white border border-gray-400 rounded-md">
    <div class="bg-gray-200 p-3 rounded-t-md">Edit permission</div>
    <div class="p-4">
        <form action="{{ route('permissions.update', $permission->id) }}" method="post" class="w-full mx-auto grid grid-flow-row gap-6">
            @csrf
            @method('PATCH')
            <div class="flex flex-col justify-between w-full">
                <label for="" class="font-semibold">Permission</label>
                <input type="text" name="permission" id="" class="rounded-md border border-gray-400" value="{{ $permission->name }}">
            </div>
            <button type="submit" class="px-4 py-2 rounded-md bg-green-700 text-white w-36">Save Changes</button>
        </form>
    </div>
</div>
@endsection