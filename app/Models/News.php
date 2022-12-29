<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [

        'category_id',
        'prodesh_id',
        'category_slug',
        'title',
        'sub_title',
        'slug',
        'news_image',
        'image_caption',
        'news_body',
        'lead_news',
        'news_box',
        'type',
        'reporter',
        'view_count',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    public function prodesh()
    {
        return $this->belongsTo('App\Models\Prodesh', 'prodesh_id');
    }

    // public function getDateAttribute()
    // {
    //     return Carbon::createFromFormat(format::'Y-m-d', $this->attributes['created_at'])
    // }
}
