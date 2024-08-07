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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('news_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->text('comment');
            $table->string('status')->default(0);
            // pokud smazu news post, smazou se i vsechny komentare, on - nazev tabulky, references - id v te (on) tabulce
            $table->foreign('news_id')->references('id')->on('news_posts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
