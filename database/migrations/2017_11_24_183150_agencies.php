<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Agencies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // IF table already exists then dont process
        if(Schema::hasTable('agencies')){
            return false;
        }
        
        Schema::create('agencies', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('user_id');
            $table->string('name')->nullable();
            $table->string('city')->nullable();
            $table->Integer('service_id')->nullable();
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
        Schema::dropIfExists('agencies');
    }
}
