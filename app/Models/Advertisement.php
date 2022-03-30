<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $fillable = [
        'ad_category',
        'add_type',
        'vendor',
        'link',
        'add_image',
        'add_script'
    ];
}
