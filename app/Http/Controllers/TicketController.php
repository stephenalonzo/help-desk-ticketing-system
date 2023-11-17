<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentRequest;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\TicketRequest;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

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
            'tickets' => Ticket::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create');
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

        switch ($request->category)
        {

            case 1:
                $category = 'Printers';
            break;

        }

        Ticket::create([
            'author' => $request->author,
            'author_email' => $request->author_email,
            'title' => $request->title,
            'category' => $category,
            'description' => $request->description
        ]);

        return redirect(route('tickets.index'))->with('ticket_submitted', 'Ticket submitted successfully!');

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
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgentRequest $request, Ticket $ticket)
    {
        
        // Assign an agent to ticket

        $request->validated();

        Ticket::where('id', $ticket->id)->update([
            'assigned_agent' => $request->assigned_agent]
        );

        return redirect(route('tickets.show', $ticket->id));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
