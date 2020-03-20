<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\MOdels\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            'name' => '爱技术',
            'slug' => '/ajishu',
            'keywords' => '爱技术,K先生,K先生个人博客',
            'description' => '分享个人学习经验和技术-K先生个人博客',
        ];
        $data1=[
            'name' => '爱分享',
            'slug' => '/ashare',
            'keywords' => '爱分享,个人博客,K先生,K先生个人博客',
            'description' => '分享html模板、js特效、php源码等资源-K先生的博客',
        ];
        $data2=[
            'name' => '爱生活',
            'slug' => '/alife',
            'keywords' => '爱生活,K先生,K先生个人博客',
            'description' => '记录生活的点滴，心灵的橱窗-K先生个人博客',
        ];
        $data3=[
            'name' => '爱拼搏',
            'slug' => '/apinbo',
            'keywords' => '爱拼搏,K先生,K先生个人博客',
            'description' => '只有已经做到的才是真的，一步一个脚印，用脚印记录汗水-K先生个人博客',
        ];
        $data4=[
            'name' => 'html模板',
            'pid'=>2,
            'slug' => '/ashare/html',
            'keywords' => '爱分享,html模板,个人博客模板',
            'description' => '为你分享最好看的html模板，不管是个人博客模板，还是企业官网模板，这里都有哦',
        ];
        $data5=[
            'name' => 'js特效',
            'pid'=>2,
            'slug' => '/ashare/js',
            'keywords' => '爱分享,js特效',
            'description' => '这里有各种js特效',
        ];
        $data6=[
            'name' => '其他',
            'pid'=>2,
            'slug' => '/ashare/other',
            'keywords' => '爱分享,其他',
            'description' => '其实这里才是真正的宝藏，这里有站长各种私藏的秘密资源，只有你想不到的，嗯哼？',
        ];
        Category::create($data);
        Category::create($data1);
        Category::create($data2);
        Category::create($data3);
        Category::create($data4);
        Category::create($data5);
        Category::create($data6);
//        DB::table('categories')->insert([
//            'name' => 'ssssssssss',
//            'slug' => '@gmail.com',
//            'keywords' => 'sss',
//            'description' => 'ssssss',
//        ]);
    }
}
