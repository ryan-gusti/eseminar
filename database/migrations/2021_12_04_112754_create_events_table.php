<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('user_id');
            $table->string('slug');
            $table->text('description');
            $table->string('banner');
            $table->integer('quota');
            $table->dateTime('time');
            $table->text('location_link');
            $table->unsignedInteger('price');
            $table->enum('type', ['offline', 'online']);
            $table->enum('status', ['open','pending','rejected', 'close'])->default('pending');
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('events');
    }
}