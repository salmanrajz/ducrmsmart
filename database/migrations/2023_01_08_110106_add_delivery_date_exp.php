<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lead_sales', function (Blueprint $table) {
            //
            $table->string('delivery_date')->nullable();
            $table->string('disconnection_date')->nullable();
            $table->string('activation_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lead_sales', function (Blueprint $table) {
            //
        });
    }
};
