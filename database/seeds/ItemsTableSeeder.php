<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['ガードレール', 'エムコール', '塩化カルシウム'];
        $units = ['式', '袋', '袋'];
        $quantities = [1, 10, 25];
        $unit_prices = [150000, 5000, 1000];

        foreach (array_map(NULL, $names, $units, $quantities, $unit_prices) as [ $name, $unit, $quantity, $unit_price ]) {
            DB::table('items')->insert([
                'estimate_id' => 1,
                'name' => $name,
                'unit' => $unit,
                'quantity' => $quantity,
                'unit_price' => $unit_price,
            ]);
        }
    }
}
