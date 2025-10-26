<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // DB::statement("ALTER TABLE `companies` CHANGE COLUMN `card_brand` `pm_type` VARCHAR(191) NULL DEFAULT NULL;");
        // DB::statement("ALTER TABLE `companies` CHANGE COLUMN `card_last_four` `pm_last_four` VARCHAR(4) NULL DEFAULT NULL;");

        Schema::table('subscriptions', function (Blueprint $table) {
            $table->string('stripe_price')->nullable()->after('stripe_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE `companies` CHANGE COLUMN `pm_type` `card_brand` VARCHAR(191) NULL DEFAULT NULL;");
        DB::statement("ALTER TABLE `companies` CHANGE COLUMN `pm_last_four` `card_last_four` VARCHAR(4) NULL DEFAULT NULL;");

        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn('stripe_price');
        });
    }
};
