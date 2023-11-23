@extends('layout')

@section('content')
<div class="flex flex-col gap-12">
    <div class="grid grid-cols-12 gap-6">
        <div class="px-4 py-6 rounded-md bg-blue-500 text-white col-span-3 h-36 flex flex-col justify-center">
            <h5 class="text-3xl font-semibold">{{ count($tickets) }}</h5>
            <p>Total tickets</p>
        </div>
        <div class="px-4 py-6 rounded-md bg-green-500 text-white col-span-3 h-36 flex flex-col justify-center">
            <h5 class="text-3xl font-semibold">{{ count($tickets_open) }}</h5>
            <p>Open tickets</p>
        </div>
        <div class="px-4 py-6 rounded-md bg-red-500 text-white col-span-3 h-36 flex flex-col justify-center">
            <h5 class="text-3xl font-semibold">{{ count($tickets_closed) }}</h5>
            <p>Closed tickets</p>
        </div>
    </div>
    <div class="relative overflow-x-auto space-y-4">
        <h3 class="font-semibold text-xl">Logs</h3>
        <hr>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Env
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Message
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Timestamp
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $log->id }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $log->env }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $log->action }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $log->message }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $log->timestamp }}
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection