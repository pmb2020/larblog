<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->tinyIncrements('id')->comment('分类主键id');
            $table->string('name', 15)->default('')->comment('分类名称');
            $table->tinyInteger('sort')->default(0)->comment('排序');
            $table->string('slug')->default('')->comment('链接');
            $table->tinyInteger('pid')->default(0)->comment('父级栏目id');
            $table->string('keywords')->default('')->comment('关键词');
            $table->string('description')->default('')->comment('描述');
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
        Schema::dropIfExists('categories');
    }
}
