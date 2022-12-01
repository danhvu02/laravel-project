<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "categories";
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function product() {
        return $this->hasMany('App\Models\Product', 'category_id');
    }
}
