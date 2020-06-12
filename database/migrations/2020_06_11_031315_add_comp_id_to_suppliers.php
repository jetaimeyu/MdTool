<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompIdToSuppliers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supplies', function (Blueprint $table) {
            //
            $table->string('SupplyCompID')->nullable()->comment('供应商企业ID');
            $table->smallInteger('Status')->default(1)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supplies', function (Blueprint $table) {
            //
            $table->dropColumn('SupplyCompID');
        });
    }
}
