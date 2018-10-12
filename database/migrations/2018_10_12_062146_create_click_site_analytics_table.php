<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClickSiteAnalyticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('click_site_analytics', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sites_id');
            $table->foreign('sites_id')->references('id')->on('sites')->onDelete('cascade');
            $table->integer('coordinate_Y');
            $table->integer('coordinate_X');
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
        Schema::dropIfExists('click_site_analytics');
    }
}
