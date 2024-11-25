<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            'user_id' => 1,
            'name' => 'Red',
            'code' => '#ff0000',
            'created_at' => Carbon::now()
        ]);
        DB::table('colors')->insert([
            'user_id' => 1,
            'name' => 'Green',
            'code' => '#008000',
            'created_at' => Carbon::now()
        ]);
        DB::table('colors')->insert([
            'user_id' => 1,
            'name' => 'Blue',
            'code' => '#0000FF',
            'created_at' => Carbon::now()
        ]);
        DB::table('colors')->insert([
            'user_id' => 1,
            'name' => 'White',
            'code' => '#FFFFFF',
            'created_at' => Carbon::now()
        ]);
        DB::table('colors')->insert([
            'user_id' => 1,
            'name' => 'Black',
            'code' => '#000000',
            'created_at' => Carbon::now()
        ]);
    }
}
