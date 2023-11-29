@extends('layout')

@section('content')
<div class="bg-white rounded-md border border-gray-300">
    <div class="bg-gray-100 p-3 rounded-t-md">{{ ucfirst(Route::current()->getName()) }}</div>
    <div class="p-4">
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
                <table class="w-full overflow-y-scroll text-sm text-left rtl:text-right text-gray-500 border border-gray-300">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                @sortablelink('id', 'ID')
                            </th>
                            <th scope="col" class="px-6 py-3">
                                @sortablelink('env', 'Environment')
                            </th>
                            <th scope="col" class="px-6 py-3">
                                @sortablelink('action', 'Action')
                            </th>
                            <th scope="col" class="px-6 py-3">
                                @sortablelink('message', 'Message')
                            </th>
                            <th scope="col" class="px-6 py-3">
                                @sortablelink('timestamp', 'Timestamp')
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
                {{ $logs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection