<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('news')->insert($this->getData());
    }
    private function getData():array {
        $faker = Faker\Factory::create('ru_RU');
        $data = [];
        for($i = 0; $i < 10; $i++){
            $data[]=[
              'title'=>$faker->sentence(rand(3,7)),
              'text'=>$faker->realText(rand(200,500)),
              'image'=>$faker->imageUrl(400,400),
            ];
        }
        return $data;
    }
}
