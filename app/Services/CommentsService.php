<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;

class CommentsService
{
    public function __construct
    (
        public Comment $model
    ) {
    }


    /**
     * @param array $request Data from form
     * @param int $id ID of ticket
     * @param int $userId ID of auth user
     *
     * @return void
     */
    public function create(array $request, int $id, int $userId)
    {
        $data = $request->validated();

        return $this->model
            ->create([
                'ticket_id' => $id,
                'user_id' => $userId,
                'message' => $data['message'],
            ]);
    }
}




