<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('')->comment('分类名称');
            $table->unsignedInteger('pid')->default(0)->comment('父级id');
            $table->smallInteger('level')->default(1)->comment('分类等级');
            $table->smallInteger('status')->default(0)->comment('0-禁用 1-正常');
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
        Schema::dropIfExists('goods_categories');
    }
}
