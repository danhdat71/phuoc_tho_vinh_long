<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Repositories\ContentRepository;
use Carbon\Carbon;

class ContentSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();
        $data = [
            [
                'title' => 'TIÊU ĐỀ THUỘC NỘI DUNG GIAO DIỆN 1',
                'content' => '<p style="color: white; padding-bottom: 5px">Nội dung demo</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>',
                'status' => true,
                'big_img' => 'https://picsum.photos/800/600',
                'thumb_img' => 'https://picsum.photos/800/600',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'title' => 'TIÊU ĐỀ THUỘC NỘI DUNG GIAO DIỆN 2',
                'content' => '<p style="color: white; padding-bottom: 5px">Nội dung demo</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>',
                'status' => true,
                'big_img' => 'https://picsum.photos/800/600',
                'thumb_img' => 'https://picsum.photos/800/600',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'title' => 'TIÊU ĐỀ THUỘC NỘI DUNG GIAO DIỆN 3',
                'content' => '<p style="color: white; padding-bottom: 5px">Nội dung demo</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>',
                'status' => true,
                'big_img' => 'https://picsum.photos/800/600',
                'thumb_img' => 'https://picsum.photos/800/600',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'title' => 'TIÊU ĐỀ THUỘC NỘI DUNG GIAO DIỆN 4',
                'content' => '<p style="color: white; padding-bottom: 5px">Nội dung demo</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>',
                'status' => true,
                'big_img' => 'https://picsum.photos/800/600',
                'thumb_img' => 'https://picsum.photos/800/600',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'title' => 'TIÊU ĐỀ THUỘC NỘI DUNG GIAO DIỆN 5',
                'content' => '<p style="color: white; padding-bottom: 5px">Nội dung demo</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>',
                'status' => true,
                'big_img' => 'https://picsum.photos/800/600',
                'thumb_img' => 'https://picsum.photos/800/600',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'title' => 'TIÊU ĐỀ THUỘC NỘI DUNG GIAO DIỆN 6',
                'content' => '<p style="color: white; padding-bottom: 5px">Nội dung demo</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>
                    <p style="color: white; padding-bottom: 5px">Nội dung chi tiết demo dành cho content được tạo tự động</p>',
                'status' => true,
                'big_img' => 'https://picsum.photos/800/600',
                'thumb_img' => 'https://picsum.photos/800/600',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ];
        ContentRepository::db()->truncate();
        ContentRepository::db()->insert($data);
    }
}
