<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Ticket;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($id){
        $ticket = Ticket::findOrFail($id);
        return view('comment', ['ticket' => $ticket]);
    }
    public function store(CommentRequest $request, $id){
        $data = $request->validated();
        Comment::create([
            'ticket_id' => $id,
            'user_id' => auth()->id(),
            'message' => $data['message'],
        ]);
        return redirect()->route('main.index');
    }
}
