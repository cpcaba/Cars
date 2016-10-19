<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(ModeloSeeder::class);
        $this->call(CarsSeeder::class);

    }
}
