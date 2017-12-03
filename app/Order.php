<?php

namespace App;

use App\Ticket;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $guarded = [];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function cancel()
    {
        foreach($this->tickets as $ticket) {
//            $ticket->release();
            $ticket->update(['order_id'=> null]);
        }

        $this->delete();
    }

    public function ticketQuantity()
    {
        return $this->tickets->count();
    }
}
