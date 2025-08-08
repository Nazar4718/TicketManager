<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Models\Ticket;
use App\Repositories\TicketRepository;
use App\Services\CommentsService;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct(public TicketRepository $ticketRepository, public CommentsService $commentsService)
    {
    }

    public function index(){
        $ticket = $this->ticketRepository->getOwnTickets();
        $commentsByTicket = [];
        foreach($ticket as $item){
            $commentsByTicket[$item->id] = $this->commentsService->getComments($item->id);
        }
        return view('main', ['ticket' => $ticket, 'commentsByTicket' => $commentsByTicket]);
    }

    public function store(TicketRequest $request){
        $data = $request->validated();

        Ticket::create([
            'user_id' => auth()->id(),
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => 'open',
            'priority' => $data['priority'],
        ]);
        return redirect()->route('main.index');
    }

    public function show($id){
        $ticket = $this->ticketRepository->getTicketById($id);
        $myComment = $this->commentsService->getAllMyComments($id);
        $itsNotMyComments = $this->commentsService->getNotMineComments($id);

        return view('show', ['ticket' => $ticket, 'comments' => $myComment, 'itsNotMyComments' => $itsNotMyComments]);
    }

}
