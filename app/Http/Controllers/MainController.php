<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Models\Ticket;
use App\Repositories\TicketRepository;
use App\Services\CommentsService;
use App\Services\TicketService;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function __construct(public TicketRepository $ticketRepository, public CommentsService $commentsService, public TicketService $ticketService)
    {
    }

    public function index(){
        $ticket = $this->ticketRepository->getOwnTickets();
        $commentsByTicket = $this->ticketService->getCommentsByTicket($this->commentsService, $ticket);
        return view('main', ['ticket' => $ticket, 'commentsByTicket' => $commentsByTicket]);
    }

    public function store(TicketRequest $request){
        $this->ticketService->create($request);
        return redirect()->route('main.index');
    }

    public function show($id){
        $ticket = $this->ticketRepository->getTicketById($id);
        $comments = $this->commentsService->getComments($id);
        return view('show', ['ticket' => $ticket, 'comments' => $comments]);
    }

}
