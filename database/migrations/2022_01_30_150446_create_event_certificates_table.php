<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->unique();
            $table->string('no_certificate');
            $table->string('ketua_pelaksana');
            $table->string('ttd_pelaksana');
            $table->string('pemateri');
            $table->string('ttd_pemateri');
            $table->string('logo')->nullable();
            $table->string('text')->nullable();
            $table->string('sertifikat')->nullable();
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
        Schema::dropIfExists('event_certificates');
    }
}
