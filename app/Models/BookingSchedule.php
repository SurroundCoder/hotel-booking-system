<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingSchedule extends Model
{
    use HasFactory;
    protected $table        = 'booking_schedule';
    protected $primaryKey   = 'id';
    public $incrementing    = true;
    public $timestamps      = true;

    protected $fillable = [
        'room_id',
        'customer_id',
        'checkin_in_date',
        'checkin_out_date',
        'payment_status',
    ];
}
