<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'dummy@email.com',
            'password' => bcrypt('test1234'),
            'postal_code' => "123-4567",
            'address' => "XXX県YYY市ZZZ町1丁目2-34",
            'address2' => "XXXタワービルディング 8F",
            'company' => "株式会社TEST COMPANY",
            'phone_number' => "123-456-7890",
            'fax_number' => "012-345-6789",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
