<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduledBooking extends Model
{
    protected $fillable = [
        'booking_id',
        'start',
        'end',
        'clear_payment_before'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
