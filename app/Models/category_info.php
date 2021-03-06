<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_info extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'name',
        'item_id',
        'sl',
        'icon',
        'category_name'
    ];
}
