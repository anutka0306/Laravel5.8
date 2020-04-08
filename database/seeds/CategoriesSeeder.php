<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        \Illuminate\Support\Facades\DB::table('categories')->insert($this->getData());
    }

    private function getData():array
    {
       return [
            0 => [
                'name' => 'Спорт',
                'slug' => 'sport',
                'description' => 'Самые свежие новости спорта',
                'image' => null
            ],
            1 => [
                'name' => 'Культура',
                'slug' => 'culture',
                'description' => 'Самые свежие новости культуры',
                'image' => null
            ],
            2 => [
                'name' => 'Наука',
                'slug' => 'science',
                'description' => 'Самые свежие новости науки',
                'image' => null
            ]
        ];

    }
}
