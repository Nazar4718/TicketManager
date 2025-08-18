<?php

namespace App\Services;

use App\Models\Comment;

class CommentsService
{
    public function __construct(
        public Comment $model
    )
    {
    }

    public function getComments($ticket_id)
    {
        return $this->model
            ->where('ticket_id', $ticket_id)
            ->with('user')
            ->get();
    }


    public function create($request, $id)
    {
        $data = $request->validated();
        return $this->model
            ->create([
                'ticket_id' => $id,
                'user_id' => auth()->id(),
                'message' => $data['message'],
            ]);
    }
}




