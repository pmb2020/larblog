<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('评论表主键');
            $table->boolean('status')->default('0')->comment('文章状态0正常 1审核中');
            $table->boolean('is_top')->default(0)->comment('是否置顶 1是 0否');
            $table->string('username',30)->default('')->comment('昵称');
            $table->integer('article_id')->default(0);
            $table->integer('replay_id')->default(0)->comment('默认0一级评论，其他则为二级评论');
            $table->text('content')->comment('评论内容');
            $table->string('href')->default('');
            $table->string('email')->default('');
            $table->string('ip',16)->default('');
            $table->string('address')->default('');
            $table->integer('zan_num')->default(0)->comment('点赞数');
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
        Schema::dropIfExists('comments');
    }
}
