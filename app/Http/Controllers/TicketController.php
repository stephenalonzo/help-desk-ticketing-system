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

            return redirect(route('tickets.index'))->with('ticket_submitted', 'Ticket submitted successfully!');

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
    public function edit($id)
    {

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
