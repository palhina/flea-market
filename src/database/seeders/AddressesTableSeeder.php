<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address; 

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addresses = [
            [
                'user_id' => '1',
                'postcode' => '540-0002',
                'address' =>'大阪市中央区大阪城１番',
                'building' =>'大阪城',
            ],
            [
                'user_id' => '2',
                'postcode' => '663-8152',
                'address' =>'兵庫県西宮市甲子園町１番',
                'building' =>'阪神甲子園球場',
            ],
        ];
        foreach ($addresses as $address) 
        {
            Address::create([
                'user_id' => $address['user_id'],
                'postcode' => $address['postcode'],
                'address' => $address['address'],
                'building' => $address['building'],
            ]);
        }
    }
}
