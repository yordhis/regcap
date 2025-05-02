<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Person::factory(10)->create();
        Person::factory()->count(60)->create();
        // Uncomment the line below to create a specific person
        // Person::factory()->create(['name' => 'John Doe', 'email' => '
    }
}
