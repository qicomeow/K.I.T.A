<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();

            // First participant
            $table->foreignId('user_one_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Second participant
            $table->foreignId('user_two_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Optional Marketplace item
            $table->foreignId('community_item_id')
                ->nullable()
                ->constrained('community_items')
                ->nullOnDelete();

            $table->timestamps();

            $table->unique([
                'user_one_id',
                'user_two_id',
                'community_item_id'
            ], 'conversations_unique_pair_item');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('conversations');
    }
};