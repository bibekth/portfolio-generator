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
        // Schema::create('blog_posts', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('portfolio_id')->constrained(table:'portfolios')->onUpdate('cascade')->onDelete('cascade');
        //     $table->string('title');
        //     $table->string('slug')->unique()->nullable();
        //     $table->longText('context')->nullable();
        //     $table->string('feature_image')->nullable();
        //     $table->tinyInteger('status')->default(0);
        //     $table->timestamp('published_at')->nullable();
        //     $table->timestamps();
        //     $table->softDeletes();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('blog_posts');
    }
};
