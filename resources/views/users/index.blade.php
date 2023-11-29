@extends('layout')

@section('content')
@if (session()->has('message'))
    {{ session('message') }}
@endif
<div class="relative overflow-x-auto w-2/3">
    <div class="bg-white rounded-md border border-gray-300">
        <div class="bg-gray-100 p-3 rounded-t-md">{{ Route::current()->getName() == 'users.index' ? 'Manage Users' : '' }}</div>
        <div class="p-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 border border-gray-300">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->id }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->email }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium flex flex-row items-center space-x-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('users.edit', $user->id) }}" class="rounded-md px-4 py-2 bg-green-700 text-white">Edit</a>
                            <form action="{{ route('users.destroy' , $user->id) }}" method="post">
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