<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
            'id' => '1',
            'name' => 'PHP',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '2',
            'name' => 'Python',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '3',
            'name' => 'Ruby',
            'created_at' => now(),
            'updated_at' => now(),
                ]
            ]);
    }
}
