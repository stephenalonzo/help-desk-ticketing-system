@extends('layout')

@section('content')
@if (session()->has('message'))
    {{ session('message') }}
@endif
<div class="bg-white border border-gray-300 rounded-md">
    <div class="bg-gray-200 p-3 rounded-t-md">Create a permission</div>
    <div class="p-4">
        <form action="{{ route('permissions.store') }}" method="post" class="w-full mx-auto grid grid-flow-row gap-6">
            @csrf
            <div class="flex flex-col justify-between w-full">
                <label for="" class="font-semibold">Permission Name</label>
                <input type="text" name="permission" id="" class="p-2 rounded-md border border-gray-300">
            </div>
            <button type="submit" class="px-4 py-2 rounded-md bg-blue-700 text-white w-24">Submit</button>
        </form>
    </div>
</div>
@endsection