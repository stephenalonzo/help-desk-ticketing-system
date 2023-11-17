@extends('layout')

{{-- @if (session()->has('ticket_submitted'))
    {{ $ticket_submitted }}
@endif --}}

@section('content')
<div class="bg-white border border-gray-400 rounded-md">
    <div class="bg-gray-200 p-3 rounded-t-md">Create a ticket</div>
    <div class="p-4">
        <form action="{{ route('tickets.store') }}" method="post" class="w-full mx-auto grid grid-flow-row gap-6">
            @csrf
            <div class="flex flex-col justify-between w-full">
                <label for="" class="font-semibold">Your Name</label>
                <input type="text" name="author" id="" class="rounded-md border border-gray-400" value="{{ Auth::user()->name }}">
            </div>
            <div class="flex flex-col justify-between w-full">
                <label for="" class="font-semibold">Your Email</label>
                <input type="email" name="author_email" id="" class="rounded-md border border-gray-400" value="{{ Auth::user()->email }}">
            </div>
            <div class="flex flex-col justify-between w-full">
                <label for="" class="font-semibold">Title</label>
                <input type="text" name="title" id="" class="rounded-md border border-gray-400">
            </div>
            <div class="flex flex-col justify-between w-full">
                <label for="" class="font-semibold">Category</label>
                <select name="category" id="" class="rounded-md border border-gray-400">
                    <option value="1">Printer</option>
                </select>
            </div>
            <div class="flex flex-col justify-between w-full">
                <label for="" class="font-semibold">Description</label>
                <textarea name="description" id="" class="rounded-md border border-gray-400 h-48 resize-none"></textarea>
            </div>
            <button type="submit" class="px-4 py-2 rounded-md bg-blue-700 text-white w-24">Submit</button>
        </form>
    </div>
</div>
@endsection