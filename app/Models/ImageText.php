<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageText extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'heading',
        'sub_head',
    ];
}
