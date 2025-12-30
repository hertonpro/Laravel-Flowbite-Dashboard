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
        // Table pour les vues de pages
        Schema::create('page_views', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('referer')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamp('visited_at');
            $table->integer('duration')->nullable(); // en secondes
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->index(['url', 'visited_at']);
            $table->index(['user_id', 'visited_at']);
        });

        // Table pour les métriques quotidiennes agrégées
        Schema::create('daily_metrics', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('metric_name');
            $table->bigInteger('metric_value');
            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->unique(['date', 'metric_name']);
            $table->index(['metric_name', 'date']);
        });

        // Table pour les activités utilisateur
        Schema::create('user_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('action');
            $table->string('model_type')->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->json('properties')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->index(['user_id', 'created_at']);
            $table->index(['action', 'created_at']);
            $table->index(['model_type', 'model_id']);
        });

        // Table pour les statistiques de contenu
        Schema::create('content_stats', function (Blueprint $table) {
            $table->id();
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');
            $table->date('date');
            $table->integer('views')->default(0);
            $table->integer('unique_views')->default(0);
            $table->integer('interactions')->default(0);
            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->unique(['model_type', 'model_id', 'date']);
            $table->index(['model_type', 'model_id']);
            $table->index(['date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_stats');
        Schema::dropIfExists('user_activities');
        Schema::dropIfExists('daily_metrics');
        Schema::dropIfExists('page_views');
    }
};
