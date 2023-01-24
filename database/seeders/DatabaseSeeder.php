<?php

namespace Database\Seeders;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Movie::factory(1)->create(); 
    }
}
