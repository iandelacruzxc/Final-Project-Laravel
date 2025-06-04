<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('stall_rentals', function (Blueprint $table) {
            // Drop foreign key and tenant_id column
            $table->dropForeign(['tenant_id']);
            $table->dropColumn('tenant_id');

            // Add tenant_name column
            $table->string('tenant_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stall_rentals', function (Blueprint $table) {
            // Drop tenant_name column
            $table->dropColumn('tenant_name');

            // Restore tenant_id column with foreign key
            $table->foreignId('tenant_id')->constrained()->onDelete('cascade');
        });
    }
};
