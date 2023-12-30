<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'user_id',
        'condition_id',
        'img_url',
        'item_name',
        'description',
        'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class, 'condition_id', 'id');
    }

    public function itemCategories()
    {
        return $this->hasMany(ItemCategory::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'item_categories', 'item_id', 'category_id');
    }
}
