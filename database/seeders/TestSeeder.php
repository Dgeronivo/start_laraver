<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    public function run(): void
    {
        \DB::table('test')
            ->insert([
                'name' => 'name' . \Str::random(2),
                'active' => rand(0, 1),
            ]);
    }
}
