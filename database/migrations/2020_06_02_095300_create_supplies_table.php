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
        $table->string('mdt')->nullable()->comment('通号');
        $table->string('SupplyItemID')->comment('供应商ID');
        $table->string('SupplyCompID')->nullable()->comment('供应商企业ID');
        $table->smallInteger('Status')->default(1)->nullable()->comment('状态');
        $table->integer("MainFactoryCompID")->comment('主机厂企业ID');
        $table->string('Supporter')->nullable()->comment('实施人员');
        $table->smallInteger('SupporterType')->default(0)->comment('实施方式');
        $table->integer('IsUsed')->default(0)->comment('是否使用0=>未知 1=>已使用 2=>未使用');
        $table->string('Note')->nullable()->comment('备注');
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
