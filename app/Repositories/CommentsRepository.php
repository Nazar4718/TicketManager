<?php

namespace App\Repositories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;

class CommentsRepository
{
    public function __construct
    (
        public Comment $model,
    ){}

    /**
     * @param int $ticket_id ID of ticket
     *
     * @return Collection
     */
    public function getComments($ticket_id)
    {
        return $this->model
            ->where('ticket_id', $ticket_id)
            ->with('user')
            ->get();
    }
}
