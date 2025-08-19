<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Ticket;
use App\Repositories\CommentsRepository;
use App\Repositories\TicketRepository;
use App\Services\CommentsService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function __construct(
        public CommentsService $commentsService,
        public TicketRepository   $ticketRepository
    ) {
    }
    /**
     * @param int $id Id тікета
     *
     * @return View
     */
    public function index($id)
    {
        $ticket = $this->ticketRepository->getTicketById($id); // Беремо тікет по id

        return view('comment', ['ticket' => $ticket]);
    }

    /**
     * @param array $request Перевірка даних
     *
     * @param int $id Id тікета
     */
    public function store(CommentRequest $request, int $id)
    {
        $userId = auth()->id();
        $this->commentsService->create($request, $id, $userId);

        return redirect()->route('main.index');
    }
}
