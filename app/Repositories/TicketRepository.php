<?php

namespace App\Repositories;

use App\Models\Ticket;
use App\Services\CommentsService;
use Illuminate\Database\Eloquent\Collection;

class TicketRepository
{
    public function __construct
    (
        public Ticket $model
    )
    {
    }
    /**
     * // Return user tickets with same id
     *
     * @return Collection
     */
    public function getOwnTickets()
    {
        return $this->model
            ->where('user_id', auth()->id())
            ->with('user')
            ->get();
    }
    /**
     * // Highlight all comments from table
     *
     * @return Collection
     */
    public function getAllComments()
    {
        return $this->model
            ->with('user')
            ->get();
    }
    /**
     * // It take first ticket which has same id
     *
     * @param int $id Ticket ID
     *
     * @return Collection
     */
    public function getTicketById(int $id)
    {
        return $this->model
            ->where('id', $id)
            ->first();
    }
    /**
     * // It give opportunity so that filter tickets by priority
     *
     * @param string $priority Importance of ticket
     *
     * @return Collection
     */
    public function getTicketsByPriority(string $priority)
    {
        return $this->model
            ->where('priority', $priority)
            ->with('user')
            ->get();
    }

    /**
     * // It`s help to take all comments by ticket
     *
     * @param CommentsRepository $commentsRepository
     *
     * @param $tickets
     *
     * @return array $commentsByTicket
     */
    public function getCommentsByTicket(CommentsRepository $commentsRepository, $tickets)
    {
        $commentsByTicket = [];
        foreach ($tickets as $item){
            $commentsByTicket[$item->id] = $commentsRepository->getComments($item->id);
        }
        return $commentsByTicket;
    }
}
