<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Repositories\IconBoxRepository;

class IconBoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'html' => '<div class="item">
    <div class="icon"><i class="fa-solid fa-map-location-dot"></i></div>
    <div class="content">Aqua City sở hữu vị trí trung tâm đường Hương Lộ 2 thuận tiện kết nối liên vùng nhanh chóng.</div>
</div>
<div class="item">
    <div class="icon"><i class="fa-solid fa-map-location-dot"></i></div>
    <div class="content">Aqua City sở hữu vị trí trung tâm đường Hương Lộ 2 thuận tiện kết nối liên vùng nhanh chóng.</div>
</div>
<div class="item">
    <div class="icon"><i class="fa-solid fa-map-location-dot"></i></div>
    <div class="content">Aqua City sở hữu vị trí trung tâm đường Hương Lộ 2 thuận tiện kết nối liên vùng nhanh chóng.</div>
</div>
<div class="item">
    <div class="icon"><i class="fa-solid fa-map-location-dot"></i></div>
    <div class="content">Aqua City sở hữu vị trí trung tâm đường Hương Lộ 2 thuận tiện kết nối liên vùng nhanh chóng.</div>
</div>
<div class="item">
    <div class="icon"><i class="fa-solid fa-map-location-dot"></i></div>
    <div class="content">Aqua City sở hữu vị trí trung tâm đường Hương Lộ 2 thuận tiện kết nối liên vùng nhanh chóng.</div>
</div>'
            ]
        ];
        IconBoxRepository::db()->truncate();
        IconBoxRepository::db()->insert($data);
    }
}
