<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    
    public function index()
    {

        $tickets = Ticket::where('assigned_agent', Auth::user()->id)->get();

        if (count($tickets) != 0)
        {

            return view('agents.index', [
                'tickets' => $tickets
            ]);

        } else {

            return redirect(route('tickets.index'));
            
        }

    }

}
