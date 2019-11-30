<?php

use App\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
       $this->call(AdminTableSeeder::class);
       $this->call(CategoriesTableSeeder::class);
       $this->call(ProductsTableSeeder::class);
    }
}
