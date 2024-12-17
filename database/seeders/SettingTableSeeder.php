<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('settings')->delete();
        $data = [
            [
                'address'=>'',
                'email'=>'info@bhole.com',
                'sunday'=>'10:00 a.m-04:00pm',
                'monday'=>'10:00 a.m-04:00pm',
                'tuesday'=>'10:00 a.m-04:00pm',
                'wednesday'=>'10:00 a.m-04:00pm',
                'thursday'=>'10:00 a.m-04:00pm',
                'friday'=>'10:00 a.m-04:00pm',
                'saturday'=>'CLOSED',
                
            ],
            
            ];
        \App\Models\Setting::insert($data);
    }
}
