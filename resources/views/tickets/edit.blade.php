@extends('layout')

@section('content')
<div class="bg-white border border-gray-400 rounded-md">
    <div class="bg-gray-200 p-3 rounded-t-md">Edit ticket</div>
    <div class="p-4">
        <form action="{{ route('tickets.update', $ticket->id) }}" method="post" class="w-full mx-auto grid grid-flow-row gap-6">
            @csrf
            @method('PATCH')
            <div class="flex flex-col justify-between w-full">
                <label for="" class="font-semibold">Your Name</label>
                <input type="text" name="author" id="" class="px-0 py-2 rounded-md border-none cursor-default focus:outline-none focus:ring-0 focus:border-transparent" readonly value="{{ Auth::user()->name }}">
            </div>
            <div class="flex flex-col justify-between w-full">
                <label for="" class="font-semibold">Your Email</label>
                <input type="email" name="author_email" id="" class="px-0 py-2 rounded-md border-none cursor-default focus:outline-none focus:ring-0 focus:border-transparent" readonly value="{{ Auth::user()->email }}">
            </div>
            <div class="flex flex-col justify-between w-full">
                <label for="" class="font-semibold">Title</label>
                <input type="text" name="title" id="" class="rounded-md border border-gray-400" value="{{ $ticket->title }}">
            </div>
            <div class="flex flex-col justify-between w-full">
                <label for="" class="font-semibold">Category</label>
                <select name="category" id="" class="rounded-md border border-gray-400">
                    @foreach ($categories as $category)
                        @foreach ($ticket->categories as $ticket_category)
                            <option value="{{ $category->id }}" {{ $category->id == $ticket_category->id ? 'selected' : ''}}>{{ $category->category }}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col justify-between w-full">
                <label for="" class="font-semibold">Priority</label>
                <select name="priority" id="" class="rounded-md border border-gray-400">
                    @foreach ($priorities as $priority)
                        @foreach ($ticket->priorities as $ticket_priority)
                            <option value="{{ $priority->id }}" {{ $priority->id == $ticket_priority->id ? 'selected' : ''}}>{{ $priority->priority }}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col justify-between w-full">
                <label for="" class="font-semibold">Description</label>
                <textarea name="description" id="" class="rounded-md border border-gray-400 h-48 resize-none">{{ $ticket->description }}</textarea>
            </div>
            <button type="submit" class="px-4 py-2 rounded-md bg-blue-700 text-white w-24">Submit</button>
        </form>
    </div>
</div>
@endsection