<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreteVendorcategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vendor_categories',function (Blueprint $table){
            $table->integer('id')->primary();
            $table->text('name');
            $table->string('image');
            $table->integer('order');
            $table->integer('parent_id')->index(['parent_id','parent_id']);
            $table->string('slug')->index(['slug','slug']);
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
        Schema::drop('vendor_categories');
    }
}
