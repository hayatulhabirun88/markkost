<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('datakosts', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kost');
            $table->text('fasilitas');
            $table->bigInteger('harga');
            $table->string('no_telp');
            $table->text('alamat');
            $table->string('gambar');
            $table->text('maps');
            $table->text('keterangan');
            $table->string('video')->nullable();
            $table->bigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datakosts');
    }
};
