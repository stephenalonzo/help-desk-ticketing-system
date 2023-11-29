<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Requests\AgentRequest;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TicketNotification;
use Illuminate\Support\Facades\Notification;

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

        $agents = User::where('id', $request->assigned_agent)->get();

        Ticket::where('id', $ticket->id)->update([
            'assigned_agent' => $request->assigned_agent]
        );

        $this->appLog(
            $request->route()->getName(), 
            'CREATED', 
            'Assigned agent to ticket'
        );

        foreach ($agents as $agent)
        {

            $details = [
                'greeting' => 'Hi, '. $agent['name'] .'! This ticket needs your attention.',
                'body' => 'You have been assigned a new ticket: '. $ticket->title .'',
                'actiontext' => 'View Ticket',
                'actionurl' => '127.0.0.1:8000/tickets/'. $ticket->id .'',
                'lastline' => 'Thank you!'
            ];
    
            Notification::send($agent, new TicketNotification($details));

        }
        
        return redirect(route('tickets.show', $ticket->id));
        
    }

}
