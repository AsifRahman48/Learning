<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Member;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
       // Member::factory(5)->create();

        $faker=Faker::create();

        foreach (range(1,10) as $index)
        {
            DB::table('tags')->insert([
                'name'=>$faker->name,
            ]);
        }
        foreach (range(1,10) as $index)
        {
            DB::table('categories')->insert([
                'name'=>$faker->name,
            ]);
        }
//        $gender=$faker->randomElement(['male','female']);
//
//        foreach (range(1,20) as $index)
//        {
//            DB::table('students')->insert([
//                'name'=>$faker->name($gender),
//                'email'=>$faker->email,
//                'username'=>$faker->username,
//                'phone'=>$faker->phoneNumber,
//                'dob'=>$faker->date($formate='Y-m-d', $max='now')
//            ]);
//        }

    }
}
