<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('community_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');
            $table->text('description')->nullable();
            $table->string('category', 100);
            $table->enum('type', [
                'give_away',
                'borrow',
                'share',
            ]);

            $table->string('location');
            $table->string('image_path')->nullable();

            $table->enum('status', [
                'available',
                'requested',
                'unavailable',
            ])->default('available');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('community_items');
    }
};