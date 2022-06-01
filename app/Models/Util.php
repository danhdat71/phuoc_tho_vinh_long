<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Util extends Model
{
    use HasFactory;

    protected $table = 'utils';

    protected $fillable = [
        'number',
        'name',
        'big_img',
        'thumb_img',
        'status'
    ];
}
