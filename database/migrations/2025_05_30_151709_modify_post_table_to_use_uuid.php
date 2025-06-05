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
        Schema::dropIfExists('post'); // Drop the existing post table if it exists

        Schema::create('post', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Add a new UUID column as the primary key
            $table->string('title');
            $table->string('body');
            $table->string('author');
            $table->boolean('published');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');

        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('body');
            $table->string('author');
            $table->boolean('published');
            $table->timestamps();
        });
    }
};
