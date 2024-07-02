<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Staff extends Model
{
    use HasFactory;
    protected $table        = 'staff';
    protected $primaryKey   = 'id';
    public $incrementing    = true;
    public $timestamps      = true;

    protected $fillable = [
        'username',
        'password',
        'fullname',
        'email',
        'phone',
        'is_locked',
    ];

    public static function generateToken($uid){
        $token = Uuid::uuid4()->toString();
        session(['session-uid'      => $uid]);
        session(['session-token'    => $token]);

        return $token;
    }

    public static function deleteToken(){
        session()->forget('session-uid');
        session()->forget('session-token');
    }
}
