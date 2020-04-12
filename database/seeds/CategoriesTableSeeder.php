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
            'keywords' => '爱技术,PHP,laravel,mysql,linux',
            'description' => '分享自己的学习经验和技术，这里有你想要的各种技术干货',
        ];
        $data1=[
            'name' => '爱分享',
            'slug' => '/ashare',
            'keywords' => '爱分享,html模板,php源码,个人网站模板,js特效',
            'description' => '不只是分享html模板、js特效、php源码、个人网站模板等资源，还有更多你想不到的！',
        ];
        $data2=[
            'name' => '爱生活',
            'slug' => '/alife',
            'keywords' => '爱生活,个人日记,生活资讯,经典语录',
            'description' => '爱自己就是要爱生活，记录生活的点滴，留住生活的美好！',
        ];
        $data3=[
            'name' => '爱拼搏',
            'slug' => '/apinbo',
            'keywords' => '爱拼搏,努力奋斗,脚踏实地,进步',
            'description' => '结果往往要比过程更重要，只有已经做到的才是真的，一步一个脚印，用脚印记录汗水，想要成功，就要爱拼搏！',
        ];
        $data4=[
            'name' => 'html模板',
            'pid'=>2,
            'slug' => '/ashare/html',
            'keywords' => 'html模板,爱分享,个人网站模板,个人博客模板,企业网站模板',
            'description' => '为你分享最好看的html模板，你想要的各种模板，理论上这里都有哦！',
        ];
        $data5=[
            'name' => 'js特效',
            'pid'=>2,
            'slug' => '/ashare/js',
            'keywords' => 'js特效,jquery特效,网页特效代码,爱分享',
            'description' => '这里有各种js特效、jquery特效,让你一看就懂的代码',
        ];
        $data6=[
            'name' => '其他',
            'pid'=>2,
            'slug' => '/ashare/other',
            'keywords' => 'php源码,绿色软件,精品软件,黑科技,爱分享',
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
