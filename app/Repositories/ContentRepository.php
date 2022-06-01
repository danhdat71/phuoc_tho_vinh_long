<?php

namespace App\Repositories;

use App\Models\Content;
use Illuminate\Support\Facades\DB;

class ContentRepository
{
    public $model = null;
    public $db = null;

    public function __construct()
    {
        $this->model = Content::class;
        $this->db = DB::table('contents');
    }

    public static function db()
    {
        return DB::table('contents');
    }

    public static function model()
    {
        return Content::class;
    }
}