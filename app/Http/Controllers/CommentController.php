<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Comment;
use App\Models\CommentUser;
use Illuminate\Http\Request;
use App\Models\CommentTicket;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request, Ticket $ticket)
    {

        $request->validated();

        $comment = Comment::create([
            'comment' => $request->comment
        ]);

        CommentTicket::create([
            'comment_id' => $comment->id,
            'ticket_id' => $ticket->id
        ]);
        
        CommentUser::create([
            'comment_id' => $comment->id,
            'user_id' => Auth::user()->id
        ]);

        $this->appLog(
            $request->route()->getName(),
            'CREATED',
            'Comment created for Ticket ID #' . $ticket->id . ''
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
