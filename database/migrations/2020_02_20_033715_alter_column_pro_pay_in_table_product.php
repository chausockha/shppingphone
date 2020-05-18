<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnProPayInTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->tinyInteger('pro_pay')->default(0);
            $table->tinyInteger('pro_number')->default(0);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
             $table->dropColumn('pro_pay');
             $table->dropColumn('pro_number');
        });
    }
}
