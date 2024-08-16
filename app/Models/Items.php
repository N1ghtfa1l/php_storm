<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'items';
    protected $guarded = false;

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'item_categories', 'item_id', 'category_id');
    }

}
