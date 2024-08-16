<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;
    protected $table = 'categories';
    protected $guarded = false;

    public function items()
    {
        return $this->belongsToMany(Items::class, 'item_categories', 'category_id', 'item_id');
    }
}
