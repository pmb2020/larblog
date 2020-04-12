<?php

use Illuminate\Database\Seeder;
use App\MOdels\Recommend;
class RecommendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data1=[
            'type' => 0,
            'article_id' => 1,
            'sort' => 0,
        ];
        $data2=[
            'type' => 0,
            'article_id' => 14,
            'sort' => 0,
        ];
        $data3=[
            'type' => 0,
            'article_id' => 5,
            'sort' => 0,
        ];
        $data4=[
            'type' => 0,
            'article_id' => 19,
            'sort' => 0,
        ];
        $data5=[
            'type' => 0,
            'article_id' => 46,
            'sort' => 0,
        ];
        Recommend::create($data1);
        Recommend::create($data2);
        Recommend::create($data3);
        Recommend::create($data4);
        Recommend::create($data5);
    }
}
