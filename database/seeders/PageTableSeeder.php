<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->delete();
        $data = [
            [
                'title'=>'About Us',
                'slug'=>\Str::slug('about us'),
                'main'=>1,
            ],
            [
                'title'=>'Company Profile',
                'slug'=>\Str::slug('company-profile'),
                'main'=>1,
            ],
            // [
            //     'title'=>'Product',
            //     'slug'=>\Str::slug('product'),
            //     'main'=>1,
            // ],
            [
                'title'=>'Services',
                'slug'=>\Str::slug('services'),
                'main'=>1,
            ],
            [
                'title'=>'Message',
                'slug'=>\Str::slug('message'),
                'main'=>1,
            ]
            
            ];
        \App\Models\Page::insert($data);
    }
}
