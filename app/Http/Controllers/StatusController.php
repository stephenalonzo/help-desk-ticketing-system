<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Requests\StatusRequest;

class StatusController extends Controller
{
    
    public function store(StatusRequest $request, Ticket $ticket)
    {
        
        // Assign an agent to ticket

        $request->validated();

        Ticket::where('id', $ticket->id)->update([
            'status' => $request->status
        ]);

        return redirect(route('tickets.show', $ticket->id));
        
    }

}
