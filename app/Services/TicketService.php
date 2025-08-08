<?php

namespace App\Services;

use App\Models\Ticket;

class TicketService
{
    public function __construct(
        public Ticket $model
    )
    {
    }

    public function delete($id){
        return $this->model
            ->where('id', $id)
            ->delete();
    }
    public function create($request){
        $data = $request->validated();
        return $this->model
            ->create([
                'user_id' => auth()->id(),
                'title' => $data['title'],
                'description' => $data['description'],
                'status' => 'open',
                'priority' => $data['priority'],
            ]);
    }
}
