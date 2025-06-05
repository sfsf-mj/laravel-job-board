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
        Schema::create('post_tag', function (Blueprint $table) {
            $table->uuid('post_id');
            $table->uuid('tag_id');

            $table->foreign('post_id')->references('id')->on('post')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

            $table->primary(['post_id', 'tag_id']); // Composite primary key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
    }
};
