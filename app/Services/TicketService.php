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
}
