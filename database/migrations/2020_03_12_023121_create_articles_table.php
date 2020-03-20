<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('文章表主键');
            $table->string('title')->default('')->comment('标题');
            $table->boolean('is_top')->default(0)->comment('是否置顶 1是 0否');
            $table->unsignedTinyInteger('category_id')->comment('分类id');
            $table->tinyInteger('status')->default('0')->comment('文章状态0正常 1加密');
            $table->string('keywords')->default(' ')->comment('关键词');
            $table->string('description')->default(' ')->comment('描述');
            $table->text('content')->comment('内容');
            $table->string('cover')->nullable()->default(' ')->comment('封面图');
            $table->integer('read_num')->default(0)->comment('阅读量');
            $table->integer('zan_num')->default(0)->comment('点赞数');
            $table->integer('commnet_num')->default(0)->comment('评论数');
//            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
