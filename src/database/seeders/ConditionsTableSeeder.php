<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Condition; 

class ConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conditions = ['非常に良い','良い','可','難あり'];
        Condition::insert(array_map(function ($condition) {
            return ['condition_name' => $condition];
        }, $conditions));
    }
}
