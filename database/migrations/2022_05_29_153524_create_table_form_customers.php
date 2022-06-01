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
        Schema::create('form_customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name')->nullable()->default();
            $table->string('phone')->nullable()->default();
            $table->string('email')->nullable()->default();
            $table->string('desc')->nullable()->default();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_customers');
    }
};
