<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Testing\Fakes\Fake;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for($i= 0; $i<10;$i++){
            Student::create([
                'name' => $faker->name,
                'age' => $faker->numberBetween(18, 25)
            ]);
        }
    }
}
