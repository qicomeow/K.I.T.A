<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('community_events', function (Blueprint $table) {
            $table->timestamp('deleted_at')->nullable();
            $table->text('cancellation_reason')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('community_events', function (Blueprint $table) {
            $table->dropColumn([
                'deleted_at',
                'cancellation_reason',
            ]);
        });
    }
};