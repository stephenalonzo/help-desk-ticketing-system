<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Requests\AgentRequest;
use App\Http\Requests\StatusRequest;
use App\Http\Requests\TicketRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\CategoryTicket;
use App\Models\Log;
use App\Models\Priority;
use App\Models\PriorityTicket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('tickets.index', [
            'tickets' => Ticket::sortable(['id' => 'desc'])->paginate(2),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create', [
            'categories' => Category::all(),
            'priorities' => Priority::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request)
    {
        
        $request->validated();

        $user = User::where('name', $request->author)->where('email', $request->author_email)->get();

        if (count($user) == 0)
        {

            return redirect(route('tickets.create'))->with('message', 'Unable to create ticket! Please try again');

        } else {

            $ticket = Ticket::create([
                'author' => $request->author,
                'author_email' => $request->author_email,
                'title' => $request->title,
                'description' => $request->description
            ]);

            CategoryTicket::create([
                'category_id' => $request->category,
                'ticket_id' => $ticket->id
            ]);

            PriorityTicket::create([
                'priority_id' => $request->priority,
                'ticket_id' => $ticket->id
            ]);

            Log::create([
                'ticket_id' => $ticket->id,
                'action' => 'CREATED',
                'timestamp' => now(),
            ]);

            return redirect(route('tickets.index'))->with('message', 'Ticket submitted successfully!');

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $ticket = Ticket::findorFail($id);

        return view('tickets.show', [
            'ticket' => Ticket::findorFail($id),
            'users' => User::role('agent')->get(),
            'agents' => User::role('agent')->where('id', $ticket->assigned_agent)->get()
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {

        return view('tickets.edit', [
            'ticket' => Ticket::findOrFail($ticket->id),
            'categories' => Category::all(),
            'priorities' => Priority::all()
        ]);

    }

    public function update(TicketRequest $request, Ticket $ticket)
    {

        $request->validated();

        Ticket::where('id', $ticket->id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
            'author_email' => $request->author_email,
        ]);

        CategoryTicket::where('ticket_id', $ticket->id)->update([
            'category_id' => $request->category,
            'ticket_id' => $ticket->id
        ]);

        PriorityTicket::where('ticket_id', $ticket->id)->update([
            'priority_id' => $request->priority,
            'ticket_id' => $ticket->id
        ]);

        Log::create([
            'ticket_id' => $ticket->id,
            'action' => 'UPDATED',
            'timestamp' => NOW(),
        ]);

        return redirect(route('tickets.show', $ticket->id))->with('message', 'Ticket updated successfully!');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        
        $ticket = Ticket::findOrFail($ticket->id);

        Log::create([
            'ticket_id' => $ticket->id,
            'action' => 'DELETED',
            'timestamp' => NOW(),
        ]);

        $ticket->delete();

        return redirect(route('tickets.index'))->with('message', 'Ticket deleted successfully!');

    }
}
