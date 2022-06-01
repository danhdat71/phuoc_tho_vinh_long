<?php

namespace App\Repositories;

use App\Models\Util;
use Illuminate\Support\Facades\DB;

class UtilRepository
{
    public $model = null;
    public $db = null;

    public function __construct()
    {
        $this->model = Util::class;
        $this->db = DB::table('utils');
    }

    public static function db()
    {
        return DB::table('utils');
    }

    public static function model()
    {
        return Util::class;
    }
}