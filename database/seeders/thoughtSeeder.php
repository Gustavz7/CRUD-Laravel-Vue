<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class thoughtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $now = Carbon::now();

        DB::table('thoughts')->insert([
            'description' => 'pensamiento de stock 1',
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
