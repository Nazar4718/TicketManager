<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use App\Repositories\TicketRepository;
use App\Services\CommentsService;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct(public TicketRepository $ticketRepository, public CommentsService $commentsService)
    {
    }

    public function index(){
        $ticket = $this->ticketRepository->getAllComments();
        return view('admin', ['ticket' => $ticket]);
    }

    public function destroy($id){
    Ticket::where('id', $id)->delete();
    return redirect()->back();
    }

    public function low(){
        $tickets = $this->ticketRepository->getLowTickets();
        $commentsByTicket = [];
        foreach($tickets as $item){
            $commentsByTicket[$item->id] = $this->commentsService->getComments($item->id);
        }
        return view('low', ['tickets' => $tickets,   'commentsByTicket' => $commentsByTicket]);
    }
    public function medium(){
        $tickets = $this->ticketRepository->getMediumTickets();
        $commentsByTicket = [];
        foreach($tickets as $item){
            $commentsByTicket[$item->id] = $this->commentsService->getComments($item->id);
        }
        return view('low', ['tickets' => $tickets,   'commentsByTicket' => $commentsByTicket]);
    }
    public function high(){
        $tickets = $this->ticketRepository->getHighTickets();
        $commentsByTicket = [];
        foreach($tickets as $item){
            $commentsByTicket[$item->id] = $this->commentsService->getComments($item->id);
        }
        return view('low', ['tickets' => $tickets,   'commentsByTicket' => $commentsByTicket]);
    }
}
