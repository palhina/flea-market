<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment; 

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payments = ['コンビニ払い','代金引換'];
        Payment::insert(array_map(function ($payment) {
            return ['payment_method' => $payment];
        }, $payments));
    }
}
