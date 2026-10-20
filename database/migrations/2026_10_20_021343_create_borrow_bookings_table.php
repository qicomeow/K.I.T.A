<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('borrow_bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('community_item_id')
                ->constrained('community_items')
                ->cascadeOnDelete();

            $table->foreignId('borrower_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->date('start_date');
            $table->date('end_date');

            $table->string('status')->default('pending');

            $table->text('message')->nullable();
            $table->text('owner_response')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('borrow_bookings');
    }
};