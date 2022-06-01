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
        Schema::create('site_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable()->default(null);
            $table->string('desc')->nullable()->default(null);
            $table->string('keyword')->nullable()->default(null);
            $table->string('favicon_url')->nullable()->default(null);
            $table->string('image_url')->nullable()->default(null);
            $table->string('map')->nullable()->default(null);
            $table->string('google_analysis_key')->nullable()->default(null);
            $table->text('facebook_chat_code')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('link_facebook')->nullable()->default(null);
            $table->string('link_youtube')->nullable()->default(null);
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
        Schema::dropIfExists('site_infos');
    }
};
