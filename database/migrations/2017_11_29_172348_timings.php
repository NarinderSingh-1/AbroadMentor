<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Timings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        if(Schema::hasTable('timings')){
            return false;
        }
        
        Schema::create('timings', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('agency_id');
            $table->Integer('days_id');
            $table->time('open_time')->nullable();
            $table->time('close_time')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('timings');
    }
}
