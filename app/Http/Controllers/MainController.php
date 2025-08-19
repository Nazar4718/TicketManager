<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Models\Ticket;
use App\Repositories\CommentsRepository;
use App\Repositories\TicketRepository;
use App\Services\CommentsService;
use App\Services\TicketService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{

    public function __construct
    (
        public TicketRepository $ticketRepository,
        public CommentsService $commentsService,
        public TicketService $ticketService,
        public CommentsRepository $commentsRepository
    ) {
    }

    /**
     * @return View
     */
    public function index()
    {
        $ticket = $this->ticketRepository->getOwnTickets();
        $commentsByTicket = $this->ticketRepository->getCommentsByTicket($this->commentsRepository, $ticket);

        return view(
            'main',
            [
                'ticket' => $ticket,
                'commentsByTicket' => $commentsByTicket
            ]
        );
    }
    /**
     * @param array $request Data from Form
     *
     * @return RedirectResponse
     */
    public function store(TicketRequest $request)
    {
        $this->ticketService->create($request);

        return redirect()->route('main.index');
    }

    /**
     * @param int $id ID ticket
     *
     * @return View
     */
    public function show(int $id)
    {
        $ticket = $this->ticketRepository->getTicketById($id);
        $comments = $this->commentsRepository->getComments($id);

        return view(
            'show',
            [
                'ticket' => $ticket,
                'comments' => $comments
            ]
        );
    }

}
