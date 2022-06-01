<?php

namespace App\Repositories;

use App\Models\IconBox;
use Illuminate\Support\Facades\DB;

class IconBoxRepository
{
    public $model = null;
    public $db = null;

    public function __construct()
    {
        $this->model = IconBox::class;
        $this->db = DB::table('icon_boxs');
    }

    public static function db()
    {
        return DB::table('icon_boxs');
    }

    public static function model()
    {
        return IconBox::class;
    }
}