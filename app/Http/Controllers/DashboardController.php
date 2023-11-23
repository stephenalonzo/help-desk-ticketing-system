<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Ticket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index()
    {

        return view('index', [
            'tickets' => Ticket::all(),
            'tickets_open' => Ticket::where('status', 'Open')->get(),
            'tickets_closed' => Ticket::where('status', 'Closed')->get(),
            'logs' => Log::sortable(['timestamp' => 'desc'])->get()
        ]);

    }

}
