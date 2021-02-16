<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgencyServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // IF table already exists then dont process
        if(Schema::hasTable('agency_services')){
            return false;
        }
        Schema::create('agency_services', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('user_id');
            $table->Integer('service_id');
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
        Schema::dropIfExists('agency_services');
    }
}
