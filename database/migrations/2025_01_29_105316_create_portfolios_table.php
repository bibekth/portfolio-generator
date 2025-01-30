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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained(table: 'users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->foreignId('theme_id')->nullable()
                ->constrained(table: 'themes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->json('settings')->nullable();
            $table->tinyInteger('is_published')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('portfolio_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_id')->constrained(table:'portfolios')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->enum('type',['text','image','gallery','video','custom']);
            $table->text('context')->nullable();
            $table->tinyInteger('position')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('portfolio_media', function(Blueprint $table){
            $table->id();
            $table->foreignId('portfolio_id')->constrained(table:'portfolios')->onUpdate('cascade')->onDelete('cascade');
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
            $table->enum('file_type',['img','vid','doc','custom'])->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_id')->constrained(table:'portfolios')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->longText('context')->nullable();
            $table->string('feature_image')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_id')->constrained(table:'portfolios')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->text('message')->nullable();
            $table->tinyInteger('is_read')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('custom_domains', function (Blueprint $table){
            $table->id();
            $table->foreignId('user_id')->constrained(table:'users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('portfolio_id')->constrained(table:'portfolios')->onUpdate('cascade')->onDelete('cascade');
            $table->string('domain')->unique();
            $table->tinyInteger('is_verified')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('subscriptions', function(Blueprint $table){
            $table->id();
            $table->foreignId('user_id')->constrained(table:'users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('plan_id')->constrained(table:'subscription_plans')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status',['active','expired','cancelled'])->default('active');
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('subscription_histories', function(Blueprint $table){
            $table->id();
            $table->foreignId('subscription_id')->constrained(table:'subscriptions')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_histories');
        Schema::dropIfExists('subscriptions');
        Schema::dropIfExists('custom_domains');
        Schema::dropIfExists('contact_messages');
        Schema::dropIfExists('blog_posts');
        Schema::dropIfExists('portfolio_media');
        Schema::dropIfExists('portfolio_sections');
        Schema::dropIfExists('portfolios');
    }
};
