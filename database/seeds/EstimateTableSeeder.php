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
        $user = DB::table('users')->first();

        $titles = ['2021年おめでとうセール', '商品見積の件', 'サンプル見積の件'];
        $customers = ['株式会社XXX', '株式会社YYY', '株式会社ZZZ'];

        foreach (array_map(NULL, $titles, $customers) as [ $title, $customer ]) {
            DB::table('estimates')->insert([
                'title' => $title,
                'user_id' => $user->id,
                'customer' => $customer,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
