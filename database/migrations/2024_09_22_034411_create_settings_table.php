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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->ingter('author_id');
            $table->string('logo')->nullable();
            $table->string('title')->nullable();
            $table->string('icon')->nullable();
            $table->string('carousel')->nullable();
            $table->integer('left_footer')->default(0);
            $table->integer('center_footer')->default(0);
            $table->integer('right_footer')->default(0);
            $table->string('facebook')->nullable();
            $table->integer('facebook_status')->default(0);
            $table->string('instagram')->nullable();
            $table->integer('instagram_status')->default(0);
            $table->string('tiwter')->nullable();
            $table->integer('tiwter_status')->default(0);
            $table->string('youtube')->nullable();
            $table->integer('youtube_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
