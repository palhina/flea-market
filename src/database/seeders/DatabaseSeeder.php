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
        $this->call(UsersTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(FavoritesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ConditionsTableSeeder::class);
        $this->call(SoldItemsTableSeeder::class);
        $this->call(ItemCategoriesTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
    }
}
