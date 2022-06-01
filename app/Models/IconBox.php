<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IconBox extends Model
{
    use HasFactory;

    protected $table = 'icon_boxs';

    protected $fillable = [
        'html'
    ];
}
