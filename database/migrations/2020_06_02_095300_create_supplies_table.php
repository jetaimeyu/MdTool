<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->id();
            $table->string('SupplyName')->comment('供应商名称');
            $table->string('SupplyNumber')->comment('供应商编号');
            $table->string('SupplyItemID')->comment('供应商ID');
            $table->smallInteger('Status')->comment('状态');
            $table->integer("MainFactoryCompID")->comment('主机厂ID企业');
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
        Schema::dropIfExists('supplies');
    }
}
