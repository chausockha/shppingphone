<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnRatingInTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->integer('pro_total_rating')->default(0)->comment('Tổng số dánh giá ');
            $table->integer('pro_total_number')->default(0)->comment('Tổng điểm dánh giá ');
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
             $table->dropColumn('pro_total_rating');
             $table->dropColumn('pro_total_number');
        });
    }
}
