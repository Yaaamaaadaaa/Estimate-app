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
        $names = ['ガードレール', 'エムコール', 'サイン'];
        $units = ['式', '袋', '式'];
        $quenities = [1, 10, 3];
        $unit_prices = [50000, 250, 5000];

        foreach (array_map(NULL, $names, $units, $quenities, $unit_prices) as [ $name, $unit, $quenity, $unit_price ]) {
            DB::table('items')->insert([
                'estimate_id' => 1,
                'name' => $name,
                'unit' => $unit,
                'quenity' => $quenity,
                'unit_price' => $unit_price,
            ]);
        }
    }
}
