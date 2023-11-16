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
                        {{ $ticket->created_at }}
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
                    <td class="px-6 py-4">
                        {{ $ticket->status }}
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Priority
                    </th>
                    <td class="px-6 py-4">
                        {{ $ticket->priority }}
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Category
                    </th>
                    <td class="px-6 py-4">
                        {{ $ticket->category }}
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
                        <form action="" method="post">
                            @csrf
                            <select name="assigned_agent" id="" onchange="this.form.submit()">
                                <option hidden selected>Select an agent</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </form>
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Comments
                    </th>
                    <td class="px-6 py-4">
                        {{-- {{ $ticket }} --}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection