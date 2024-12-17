<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(TeamCategorySeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(PageTableSeeder::class);
        $this->call(FinancialCategorySeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(RateCategorySeeder::class);
        

    }
}
