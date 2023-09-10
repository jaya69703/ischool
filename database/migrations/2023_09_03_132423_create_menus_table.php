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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');                   // Nama Menu 
            $table->string('code');                   // Icon
            $table->string('icon')->nullable();       // Icon
            $table->string('url');                    // URL
            $table->integer('type')->default(0);      // Type Menu
            $table->integer('locate')->default(0);    // Front-End - Back-End
            $table->integer('parent_id')->nullable(); // Untuk Submenu
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
