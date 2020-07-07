<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Model\Category();
        $category->name = 'भुगाेल';
        $category->slug = \Illuminate\Support\Str::slug('भुगाेल');
        $category->user_id = 1;
        $category->status = 'public';
        $category->save();
    }
}
