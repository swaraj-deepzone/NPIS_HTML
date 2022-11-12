<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $gender = $faker->randomElement(['male', 'female']);
    	foreach (range(1,200) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name($gender),
                'email' => $faker->email,
                'password' => $faker->username,
                'no_kod' => $faker->phoneNumber,
                'jawatan' => 'jawatan',
                'jabatan' => 'jabatan',
                'no_telefon' => $faker->phoneNumber
            ]);
        }
    }
}