<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->delete();
        $data = [
            [
                'title'=>'Saving Accounts',
                'slug'=>\Str::slug('saving accounts')
            ],
            [
                'title'=>'Fixed Deposit',
                'slug'=>\Str::slug('fixed deposit')
            ],
            [
                'title'=>'Loan',
                'slug'=>\Str::slug('loan'),
            ]
            
            ];
        \App\Models\ProductCategory::insert($data);
    }
}
