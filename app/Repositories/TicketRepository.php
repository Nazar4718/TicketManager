<?php

namespace App\Repositories;

use App\Models\Ticket;

class TicketRepository
{
    public function __construct(
        public Ticket $model
    )
    {
    }

    public function getOwnTickets(){
        return $this->model
            ->where('user_id', auth()->id())
            ->with('user')
            ->get();
    }

    public function getAllComments(){
        return $this->model->with('user')->get();
    }

    public function getTicketById($id){
        return $this->model
            ->where('id', $id)->first();
    }

    public function getTicketsByPriority(string $priority){
        return $this->model
            ->where('priority', $priority)
            ->with('user')
            ->get();
    }

    public function findById($id){
        return $this->model->findOrFail($id);
    }
}
