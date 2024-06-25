<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleaningSchedule extends Model
{
    use HasFactory;
    protected $table        = 'cleaning_schedule';
    protected $primaryKey   = 'id';
    public $incrementing    = true;
    public $timestamps      = true;

    protected $fillable = [
        'room_id',
        'staff_id',
        'status',
    ];
}
