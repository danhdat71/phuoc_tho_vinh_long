<?php

namespace App\Repositories;

use App\Models\Slider;
use Illuminate\Support\Facades\DB;

class SliderRepository
{
    public $model = null;
    public $db = null;

    public function __construct()
    {
        $this->model = Slider::class;
        $this->db = DB::table('sliders');
    }

    public static function db()
    {
        return DB::table('sliders');
    }

    public static function model()
    {
        return User::class;
    }
}