<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users");
            $table->string("region");
            $table->string("phonenumber");
            $table->string('county');
            $table->string("venueAddress");
            $table->string("name");
            $table->string("type");
            $table->string("roomCount");
            $table->string("email");
            $table->string("amount");
            $table->text("images");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
