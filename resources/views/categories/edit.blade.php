@extends('layout')

@section('content')
@if (session()->has('message'))
    {{ session('message') }}
@endif
<div class="bg-white border border-gray-400 rounded-md">
    <div class="bg-gray-200 p-3 rounded-t-md">Edit category</div>
    <div class="p-4">
        <form action="{{ route('categories.update', $category->id) }}" method="post" class="w-full mx-auto grid grid-flow-row gap-6">
            @csrf
            @method('PATCH')
            <div class="flex flex-col justify-between w-full">
                <label for="" class="font-semibold">Category Name</label>
                <input type="text" name="category" id="" class="p-2 rounded-md border border-gray-400" value="{{ $category->category }}">
            </div>
            <button type="submit" class="px-4 py-2 rounded-md bg-green-700 text-white w-36">Save Changes</button>
        </form>
    </div>
</div>
@endsection