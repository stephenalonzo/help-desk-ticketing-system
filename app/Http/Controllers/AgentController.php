<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Requests\AgentRequest;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    
    public function index()
    {

        $tickets = Ticket::where('assigned_agent', Auth::user()->id)->sortable(['id' => 'desc'])->paginate(2);

        if (count($tickets) != 0)
        {

            return view('agents.index', [
                'tickets' => $tickets
            ]);

        } else {

            return redirect(route('tickets.index'));
            
        }

    }

    public function store(AgentRequest $request, Ticket $ticket)
    {
        
        // Assign an agent to ticket

        $request->validated();

        Ticket::where('id', $ticket->id)->update([
            'assigned_agent' => $request->assigned_agent]
        );

        $this->appLog(
            $request->route()->getName(), 
            'CREATED', 
            'Assigned agent to ticket'
        );
        
        return redirect(route('tickets.show', $ticket->id));
        
    }

}
