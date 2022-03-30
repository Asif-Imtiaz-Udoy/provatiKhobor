<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'order_id',
        'feature'
    ];


    public function sub()
    {
        return $this->hasMany('App\Models\SubCategory', 'category_id');
    }
}
