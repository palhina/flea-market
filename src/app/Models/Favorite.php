<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'user_id',
        'item_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    //   お気に入り登録があるかどうかを調べる
    public function scopeIsFavorite($query, $itemId, $userId)
    {
        return $query->where('item_id', $itemId)->where('user_id', $userId);
    }
}
