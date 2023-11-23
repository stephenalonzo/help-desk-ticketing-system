@extends('layout')

@section('content')
<div class="relative overflow-x-auto space-y-4">
    <div class="flex flex-row items-center justify-end">
        <form action="/tickets" method="get" class="relative">
            <i class="fas fa-search absolute top-3 left-5 transform -translate-x-1/2 text-gray-500"></i>
            <input type="text" name="search" id="" class="pl-9 rounded-md border border-gray-200 focus:outline-none focus:ring-0 focus:border-gray-200" placeholder="Search">
        </form>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    @sortablelink('id')
                </th>
                <th scope="col" class="px-6 py-3">
                    @sortablelink('title')
                </th>
                <th scope="col" class="px-6 py-3">
                    @sortablelink('status')
                </th>
                <th scope="col" class="px-6 py-3">
                    @sortablelink('priority')
                </th>
                <th scope="col" class="px-6 py-3">
                    @sortablelink('category')
                </th>
                <th scope="col" class="px-6 py-3">
                    @sortablelink('author')
                </th>
                <th scope="col" class="px-6 py-3">
                    @sortablelink('author_email', 'Author Email')
                </th>
                <th scope="col" class="px-6 py-3">
                    @sortablelink('assigned_agent', 'Assigned Agent')
                </th>
                <th scope="col" class="px-6 py-3">
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $ticket->id }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $ticket->title }}
                </th>
                <td class="px-6 py-4">
                    {{ $ticket->status }}
                </td>
                <td class="px-6 py-4">
                    @foreach ($ticket->priorities as $priority)
                        {{ $priority->priority }}
                    @endforeach
                </td>
                <td class="px-6 py-4">
                    @foreach ($ticket->categories as $category)
                        {{ $category->category }}
                    @endforeach
                </td>
                <td class="px-6 py-4">
                    {{ $ticket->author }}
                </td>
                <td class="px-6 py-4">
                    {{ $ticket->author_email }}
                </td>
                <td class="px-6 py-4">
                    {{ $ticket->assigned_agent }}
                </td>
                <td class="px-6 py-4 flex flex-row items-center justify-around">
                    <span class="flex flex-row items-center space-x-3">
                        <a href="{{ route('tickets.show', $ticket->id) }}" class="rounded-md px-4 py-2 bg-blue-700 text-white">View</a>
                    </span>
                    @if ($ticket->author_email == Auth::user()->email)
                    <span class="flex flex-row items-center space-x-3">
                        <a href="{{ route('tickets.edit', $ticket->id) }}" class="rounded-md px-4 py-2 bg-green-700 text-white">Edit</a>
                    </span>
                    @endif
                    <span class="flex flex-row items-center space-x-3">
                        <form action="{{ route('tickets.destroy', $ticket->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="rounded-md px-4 py-2 bg-red-700 text-white">Delete</button>
                        </form>
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $tickets->appends(\Request::except('page'))->render() !!}
</div>

@endsection