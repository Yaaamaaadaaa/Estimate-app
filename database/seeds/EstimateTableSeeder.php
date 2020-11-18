<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstimateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['青森', '弘前', '八戸'];
        $customers = ['seikoh', 'kakuhiro', 'yoshida'];

        foreach (array_map(NULL, $titles, $customers) as [ $title, $customer ]) {
            DB::table('estimates')->insert([
                'title' => $title,
                'customer' => $customer,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
