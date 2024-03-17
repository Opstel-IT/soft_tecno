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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('created_by');
            $table->string('title')->nullable();
            $table->text('des')->nullable(); //Description
            $table->string('img')->nullable();
            $table->string('alt_img')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->string('meta_title')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
