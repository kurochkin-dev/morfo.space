<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_group')->insert([
            'name' => 'Пользователь',
            'fields' => '{}',
            'statuses' => '{}',
            'is_admin' => '{}',
        ]);
    }
}
