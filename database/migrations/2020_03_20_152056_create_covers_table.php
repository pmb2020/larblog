<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->tinyIncrements('id')->comment('轮播主键id');
            $table->string('title')->default('')->comment('图片标题');
            $table->tinyInteger('sort')->default(0)->comment('排序');
            $table->string('link')->default('')->comment('链接地址');
            $table->string('url')->default('')->comment('图片地址');
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
        Schema::dropIfExists('covers');
    }
}
