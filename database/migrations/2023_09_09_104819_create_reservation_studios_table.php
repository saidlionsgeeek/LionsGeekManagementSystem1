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
        Schema::create('reservation_studios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->text('comment');
            $table->boolean('history')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('studio_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_studios');
    }
};
