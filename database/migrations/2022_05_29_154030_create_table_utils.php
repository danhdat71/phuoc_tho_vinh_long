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
        Schema::create('utils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->string('big_img')->nullable()->default(null);
            $table->string('thumb_img')->nullable()->default(null);
            $table->tinyInteger('status')->nullable()->default(null);
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
        Schema::dropIfExists('utils');
    }
};
