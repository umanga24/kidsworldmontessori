<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TeamCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team_categories')->delete();
        $data = [
            [
                'title'=>'BOD',
                'slug'=>\Str::slug('bod')
            ],
            [
                'title'=>'Management Team',
                'slug'=>\Str::slug('management team')
            ],
            [
                'title'=>'Branch Managers',
                'slug'=>\Str::slug('branch managers'),
            ]
            
            ];
        \App\Models\TeamCategory::insert($data);
    }
}
