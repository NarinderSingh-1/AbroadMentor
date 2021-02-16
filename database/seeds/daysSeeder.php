<?php

use Illuminate\Database\Seeder;

class daysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('days_master')->insert([
            /* Member Status */
            
            ['id' => 1, 'day' => 'monday'],
            ['id' => 2, 'day' => 'tuesday'],
            ['id' => 3, 'day' => 'wednesday'],
            ['id' => 4, 'day' => 'thursday'],
            ['id' => 5, 'day' => 'friday'],
            ['id' => 6, 'day' => 'saturday'],
            ['id' => 7, 'day' => 'sunday']
           
        ]);
    }
}
