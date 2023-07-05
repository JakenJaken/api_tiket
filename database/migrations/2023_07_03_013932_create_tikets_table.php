<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')
                ->cascadeOnUpdate('cascade')
                ->cascadeOnDelete('cascade');
            $table->unsignedBigInteger('id_event');
            $table->foreign('id_event')->references('id')->on('events')
                ->cascadeOnUpdate('cascade')
                ->cascadeOnDelete('cascade');
            $table->string('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
