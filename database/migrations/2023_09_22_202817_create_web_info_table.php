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
        Schema::create('webinfos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('about');
            $table->string('location');
            $table->string('logo')->default('logo.png');
            $table->string('web_cover_image')->default('webImage.png');
            $table->string('phone_number')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('whatsapp_first_group_url')->nullable();
            $table->string('whatsapp_second_group_url')->nullable();
            $table->string('whatsapp_third_group_url')->nullable();
            $table->string('whatsapp_forth_group_url')->nullable();
            $table->string('telegram_group_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('insta_url')->nullable();
            
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webinfo');
    }
};
