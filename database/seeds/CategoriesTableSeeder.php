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
            'keywords' => '爱技术,七墨,七墨先生,个人博客',
            'description' => '分享个人学习经验和技术，有你想要的各种技术干货 - 七墨',
        ];
        $data1=[
            'name' => '爱分享',
            'slug' => '/ashare',
            'keywords' => '爱分享,七墨,七墨先生,个人博客',
            'description' => '分享html模板、js特效、php源码等资源 - 七墨',
        ];
        $data2=[
            'name' => '爱生活',
            'slug' => '/alife',
            'keywords' => '爱生活,七墨,七墨先生,个人博客',
            'description' => '记录生活的点点滴滴，也是心灵的橱窗 - 七墨',
        ];
        $data3=[
            'name' => '爱拼搏',
            'slug' => '/apinbo',
            'keywords' => '爱拼搏,七墨,七墨先生,个人博客',
            'description' => '只有已经做到的才是真的，一步一个脚印，用脚印记录汗水 - 七墨',
        ];
        $data4=[
            'name' => 'html模板',
            'pid'=>2,
            'slug' => '/ashare/html',
            'keywords' => 'html模板,爱分享,七墨,七墨先生,个人博客',
            'description' => '为你分享最好看的html模板，不管是个人博客模板，还是企业官网模板，这里都有哦',
        ];
        $data5=[
            'name' => 'js特效',
            'pid'=>2,
            'slug' => '/ashare/js',
            'keywords' => 'js特效,jquery特效,爱分享,七墨,七墨先生,个人博客',
            'description' => '这里有各种js特效、jquery特效,让你一看就懂的代码',
        ];
        $data6=[
            'name' => '其他',
            'pid'=>2,
            'slug' => '/ashare/other',
            'keywords' => '爱分享,其他资源,七墨,七墨先生,个人博客',
            'description' => '其实这里才是真正的宝藏，这里有站长各种私藏的秘密资源，只有你想不到的，不来看看？嗯哼？',
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
