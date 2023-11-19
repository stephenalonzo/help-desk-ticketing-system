@extends('layout')

@section('content')
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
@endsection