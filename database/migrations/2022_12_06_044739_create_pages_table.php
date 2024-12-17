<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->text('heading')->nullable();
            $table->text('description')->nullable();
            $table->text('quote')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->text('our_mission_desc')->nullable();
            $table->text('our_vission_desc')->nullable();
            $table->text('partner_desc')->nullable();
            $table->boolean('publish')->default();
            $table->boolean('main')->default(1);
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
        Schema::dropIfExists('pages');
    }
}
