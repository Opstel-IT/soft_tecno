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
        Schema::create('content_with_icons', function (Blueprint $table) {
            $table->id();
            $table->string('page')->nullable();
            $table->string('sec')->nullable(); //section
            $table->string('title')->nullable();
            $table->string('icon')->nullable();
            $table->text('des')->nullable();  //description
            $table->tinyInteger('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_with_icons');
    }
};
