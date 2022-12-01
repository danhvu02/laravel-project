<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "products";
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function category() {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
}
