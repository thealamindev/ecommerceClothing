<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            'user_id' => 1,
            'name' => 'XS',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'user_id' => 1,
            'name' => 'S',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'user_id' => 1,
            'name' => 'L',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'user_id' => 1,
            'name' => 'XL',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'user_id' => 1,
            'name' => '2XL',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'user_id' => 1,
            'name' => '3XL',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'user_id' => 1,
            'name' => '4XL',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'user_id' => 1,
            'name' => '5XL',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'user_id' => 1,
            'name' => '30',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'user_id' => 1,
            'name' => '32',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'user_id' => 1,
            'name' => '34',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'user_id' => 1,
            'name' => '36',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'user_id' => 1,
            'name' => '38',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'user_id' => 1,
            'name' => '40',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'user_id' => 1,
            'name' => '42',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'user_id' => 1,
            'name' => '44',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'user_id' => 1,
            'name' => '46',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'user_id' => 1,
            'name' => '48',
            'created_at' => Carbon::now()
        ]);
        DB::table('sizes')->insert([
            'user_id' => 1,
            'name' => '50',
            'created_at' => Carbon::now()
        ]);
    }
}
