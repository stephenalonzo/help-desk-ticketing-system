@extends('layout')

@section('content')
<div class="bg-white border border-gray-400 rounded-md">
    <div class="bg-gray-200 p-3 rounded-t-md">View Ticket</div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        ID
                    </th>
                    <td class="px-6 py-4">
                        {{ $ticket->id }}
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Created at
                    </th>
                    <td class="px-6 py-4">
                        {{ date('F d, Y h:i A', strtotime($ticket->created_at)) }}
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Title
                    </th>
                    <td class="px-6 py-4">
                        {{ $ticket->title }}
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Description
                    </th>
                    <td class="px-6 py-4">
                        {{ $ticket->description }}
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Status
                    </th>
                    <td class="px-6 py-4 flex flex-row items-center space-x-6">
                        @if ($ticket->assigned_agent != Auth::user()->id)
                            @if ($ticket->status == 'Closed')
                                {{ 'Closed' }}
                            @else
                                {{ 'Open' }}
                            @endif
                        @endif
                        @if ($ticket->assigned_agent == Auth::user()->id)
                            <form action="{{ route('statuses.store', $ticket->id) }}" method="POST">
                                @csrf
                                <select name="status" id="" class="rounded-md border border-gray-400" onchange="this.form.submit()">
                                    <option value="{{ $ticket->status }}" selected>{{ $ticket->status }}</option>
                                    <option value="{{ $ticket->status == 'Closed' ? 'Open' : 'Closed' }}">{{ $ticket->status == 'Closed' ? 'Open' : 'Close' }}</option>
                                </select>
                            </form>
                        @endif
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Priority
                    </th>
                    <td class="px-6 py-4">
                        @foreach ($ticket->priorities as $priority)
                            {{ $priority->priority }}
                        @endforeach
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Category
                    </th>
                    <td class="px-6 py-4">
                        @foreach ($ticket->categories as $category)
                            {{ $category->category }}
                        @endforeach
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Author Name
                    </th>
                    <td class="px-6 py-4">
                        {{ $ticket->author }}
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Author Email
                    </th>
                    <td class="px-6 py-4">
                        {{ $ticket->author_email }}
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Assigned Agent
                    </th>
                    <td class="px-6 py-4">
                        {{-- {{ $ticket->author_email }} --}}
                        @if (empty($ticket->assigned_agent))
                        @role('admin')
                        <form action="{{ route('agents.store', $ticket->id) }}" method="POST">
                            @csrf
                            <select name="assigned_agent" id="" onchange="this.form.submit()">
                                <option hidden selected>Select an agent</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </form>
                        @endrole
                        @else
                        @foreach ($agents as $agent)
                            <p>{{ $agent->name }}</p>
                        @endforeach
                        @endif
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Comments
                    </th>
                    <td class="px-6 py-8 space-y-8">
                        @if ($ticket->assigned_agent == Auth::user()->id || $ticket->author == Auth::user()->name)
                        <form action="{{ route('comments.store', $ticket->id) }}" method="post" class="space-y-4">
                            @csrf
                            <textarea name="comment" class="w-full h-52 resize-none border border-gray-400" placeholder="Add comment..."></textarea>
                            <button type="submit" class="px-4 py-2 rounded-md bg-blue-700 text-white">Submit</button>
                        </form>
                        @endif
                        @foreach ($ticket->comments as $comment)
                        @if (count($ticket->comments) > 0)
                        <div class="space-y-4">
                            <div class="flex flex-row items-center space-x-4">
                                @foreach ($comment->users as $user)
                                <h5 class="font-semibold">{{ $user->name}}</h5>
                                @endforeach
                                <p class="text-xs text-gray-500">{{ date('F d, Y h:i A', strtotime($comment->created_at)) }}</p>
                            </div>
                            <p>{{ $comment->comment }}</p>
                        </div>
                        @else
                        <hr>
                        <div class="space-y-4">
                            <div class="flex flex-row items-center space-x-4">
                                @foreach ($comment->users as $user)
                                <h5 class="font-semibold">{{ $user->name}}</h5>
                                @endforeach
                                <p class="text-xs text-gray-500">{{ date('F d, Y h:i A', strtotime($comment->created_at)) }}</p>
                            </div>
                            <p>{{ $comment->comment }}</p>
                        </div>
                        @endif
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection