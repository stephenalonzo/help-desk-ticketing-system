@extends('layout')

@section('content')
@if (session()->has('message'))
    {{ session('message') }}
@endif
<div class="relative overflow-x-auto w-2/3">
    <div class="bg-white rounded-md border border-gray-300">
        <div class="bg-gray-100 p-3 rounded-t-md">{{ Route::current()->getName() == 'roles.index' ? 'Manage Roles' : '' }}</div>
        <div class="p-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 border border-gray-300">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $role->id }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $role->name }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap flex flex-row items-center space-x-4 dark:text-white">
                            <a href="{{ route('roles.edit', $role->id) }}" class="rounded-md px-4 py-2 bg-green-700 text-white">Edit</a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="post" class="m-0 p-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 rounded-md bg-red-700 text-white">Delete</button>
                            </form>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection