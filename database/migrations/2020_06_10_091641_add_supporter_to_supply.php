<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSupporterToSupply extends Migration
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
            $table->string('Supporter')->after('MainFactoryCompID')->nullable()->comment('实施人员');
            $table->string('SupporterType')->after('Supporter')->nullable()->comment('实施方式');
            $table->integer('IsUsed')->after('SupporterType')->default(0)->comment('是否使用0=>未知 1=>已使用 2=>未使用');
            $table->string('Note')->after('IsUsed')->nullable()->comment('备注');
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
            $table->dropColumn('Supporter');
            $table->dropColumn('SupporterType');
            $table->dropColumn('IsUsed');
            $table->dropColumn('Note');
        });
    }
}
