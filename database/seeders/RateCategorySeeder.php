<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RateCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('rate_categories')->delete();
        $data = [
            [
                'title'=>'Base Rate',
                'slug'=>\Str::slug('base-rate')
            ],
            [
                'title'=>'Interest Spread Rate',
                'slug'=>\Str::slug('interest-spread-rate')
            ],
            ];
        \App\Models\RateCategory::insert($data);
    }
}
