<?php
date_default_timezone_set('prc');
use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $time=date('Y-m-d H:i:s',time());
        $configs=[
            ['name'=>'web_title','title'=>'网站标题','value'=>'K先生 - 是一个程序员，也是一个精致boy','created_at'=>$time,'updated_at'=>$time],
            ['name'=>'web_keywords','title'=>'关键词','value'=>'K先生,K先生个人博客,个人博客,技术干货','created_at'=>$time,'updated_at'=>$time],
            ['name'=>'web_desc','title'=>'描述','value'=>'K先生个人博客，分享html模板、php源码、技术干货、黑科技等等，总之，这里有很多你想象不到的资源。K先生，是一个程序员，也是一个精致boy','created_at'=>$time,'updated_at'=>$time],
            ['name'=>'web_author','title'=>'作者','value'=>'K先生','created_at'=>$time,'updated_at'=>$time],
            ['name'=>'web_profile','title'=>'简介','value'=>'一个95后程序员，17年入行，一直潜心研究web前端技术，一边工作一边积累经验，分享一些个人博客模板，以及SEO优化等心得。','created_at'=>$time,'updated_at'=>$time],
            ['name'=>'web_about','title'=>'关于我','value'=>'','created_at'=>$time,'updated_at'=>$time],
            ['name'=>'web_code','title'=>'统计代码','value'=>'','created_at'=>$time,'updated_at'=>$time],
            ['name'=>'web_email','title'=>'站长邮箱','value'=>'','created_at'=>$time,'updated_at'=>$time],
            ['name'=>'web_icp','title'=>'备案号','value'=>'','created_at'=>$time,'updated_at'=>$time]
        ];
        \Illuminate\Support\Facades\DB::table('configs')->insert($configs);

    }
}
