<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'user_id',
        'postcode',
        'address',
        'building'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // ユーザーのアドレスを返す
    public static function addressByUser($userId)
    {
        return Address::where('user_id', $userId)->first();
    }
}
