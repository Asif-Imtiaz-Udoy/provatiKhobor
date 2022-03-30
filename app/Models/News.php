<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [

        'category_id',
        'title',
        'sub_title',
        'news_image',
        'image_caption',
        'news_body',
        'lead_news',
        'news_box',
        'type',
        'reporter',
        'sub_category'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
