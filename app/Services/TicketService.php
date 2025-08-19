<?php

namespace App\Services;

use App\Models\Ticket;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Eloquent\Collection;

class TicketService
{
    public function __construct
    (
        public Ticket $model
    ) {
    }
    /**
     * @param int $id ID of tickets
     *
     * @return Collection
     */
    public function delete(int $id)
    {
        return $this->model
            ->where('id', $id)
            ->delete();
    }

    /**
     * @param array $request Data from form
     *
     * @return Create
     * */
    public function create(array $request)
    {
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
