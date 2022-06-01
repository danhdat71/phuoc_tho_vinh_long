<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    public $model = null;
    public $db = null;

    public function __construct()
    {
        $this->model = Product::class;
        $this->db = DB::table('products');
    }

    public static function db()
    {
        return DB::table('products');
    }

    public static function model()
    {
        return Product::class;
    }
}