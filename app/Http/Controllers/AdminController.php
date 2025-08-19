<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use App\Repositories\TicketRepository;
use App\Services\CommentsService;
use App\Services\TicketService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{

    public function __construct
    (
        public TicketRepository $ticketRepository,
        public CommentsService $commentsService,
        public TicketService $ticketService
    ){
    }
    /**
     * @return View
     */
    public function index()
    {
        $ticket = $this->ticketRepository->getAllComments();

        return view('admin', ['ticket' => $ticket]);
    }

    /**
     * @param int $id ID ticket
     *
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $this->ticketService->delete($id);

        return redirect()->back();
    }
    /**
     * @param string $priority Priority of ticket
     *
     * @return View
     */
    public function show(string $priority)
    {
        $tickets = $this->ticketRepository->getTicketsByPriority($priority);
        $commentsByTicket = $this->ticketService->getCommentsByTicket($this->commentsService, $tickets);

        return view(
            'admin.show',
            [
                'tickets' => $tickets,
                'commentsByTicket' => $commentsByTicket
            ]
        );
    }
}
