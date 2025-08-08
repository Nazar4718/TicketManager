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

    public function getLowTickets(){
        return $this->model->where('priority', 'low')->with('user')->get();
    }
    public function getMediumTickets(){
        return $this->model->where('priority', 'medium')->with('user')->get();
    }
    public function getHighTickets(){
        return $this->model->where('priority', 'high')->with('user')->get();
    }
}
