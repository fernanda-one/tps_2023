<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    public function up()
    {
        Schema::create('pemilih', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('phone_number')->nullable();
            $table->integer('nik')->nullable();
            $table->string('alamat')->nullable();
            $table->integer('rt')->nullable();
            $table->integer('rw')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('lokasi_tps')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('status')->nullable();
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('role', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('img_url')->nullable();
            $table->string('password')->nullable();
            $table->string('salt')->nullable();
            $table->string('status')->nullable();
            $table->integer('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('role');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemilih');
        Schema::dropIfExists('users');
        Schema::dropIfExists('role');
    }
}
