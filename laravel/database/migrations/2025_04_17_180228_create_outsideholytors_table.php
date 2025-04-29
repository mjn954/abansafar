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
        Schema::create('outsideholytors', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title');
            $table->string('target');
            $table->string('startpoint');
            $table->integer('price');
            $table->string('status');
            $table->string('type');
            $table->text('plan');
            $table->string('duration');
            $table->text('hotel_features');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outsideholytors');
    }
};
