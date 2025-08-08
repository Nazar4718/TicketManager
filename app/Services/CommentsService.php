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

public function getComments($ticket_id){
    return $this->model
        ->where('ticket_id', $ticket_id)
        ->with('user')
        ->get();
}
    public function getAllMyComments($ticket_id){
        return $this->model
            ->where('user_id', auth()->id())->where('ticket_id', $ticket_id)->with('user')->get();
}
public function getNotMineComments($ticket_id){
    return $this->model
        ->where('user_id','!=', auth()->id())->where('ticket_id', $ticket_id)->with('user')->get();
}
}



