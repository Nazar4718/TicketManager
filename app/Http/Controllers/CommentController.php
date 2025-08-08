<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Ticket;
use App\Repositories\TicketRepository;
use App\Services\CommentsService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(public CommentsService $commentsService, public TicketRepository $ticketRepository){

    }
    public function index($id){
        $ticket = $this->ticketRepository->findById($id);
        return view('comment', ['ticket' => $ticket]);
    }
    public function store(CommentRequest $request, $id){
        $this->commentsService->create($request, $id);
        return redirect()->route('main.index');
    }
}
