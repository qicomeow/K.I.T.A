<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('community_items', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->nullable();
        });

        DB::statement("
            ALTER TABLE community_items
            MODIFY COLUMN type ENUM('give_away', 'borrow', 'sell')
            NOT NULL
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE community_items
            MODIFY COLUMN type ENUM('give_away', 'borrow', 'share')
            NOT NULL
        ");

        Schema::table('community_items', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }
};