<?php

use App\SuperAdmin\Classes\SuperAdminCommon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SuperadminCreatePaymentGatewaySubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('payment_method', 20)->default('stripe');
            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
            $table->string('customer_id')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->string('stripe_id')->nullable()->default(null); // stripe_id, razropay_id, mollie_id ....
            $table->string('stripe_status')->nullable()->default(null);
            $table->string('stripe_plan')->nullable()->default(null); // monthly, annual
            $table->integer('quantity')->nullable()->default(null);
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('ends_at')->nullable();

            $table->string('token')->nullable()->default(null);
            $table->string('status', 20)->default('active'); // ['active', 'inactive']
            $table->string('plan_id')->nullable();
            $table->string('plan_type')->nullable();

            $table->timestamps();
        });

        Schema::create('subscription_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('subscription_id');
            $table->string('stripe_id')->index();
            $table->string('stripe_product');
            $table->integer('quantity');
            $table->string('stripe_price');
            $table->timestamps();

            $table->unique(['subscription_id', 'stripe_product']);
        });

        DB::statement("ALTER TABLE `subscription_plans` CHANGE COLUMN `max_products` `max_users` INT UNSIGNED NOT NULL DEFAULT 0  COMMENT '' AFTER `monthly_price`;");

        Schema::table('companies', function (Blueprint $table) {
            $table->boolean('white_label_completed')->default(false);
        });

        if (app_type() == 'saas') {
            DB::table('companies')
                ->where('is_global', 1)
                ->update([
                    'white_label_completed' => env('APP_ENV') == 'production' ? 1 : 0
                ]);

            SuperAdminCommon::createSubscriptionPlans();
        }

        // Creating SuperAdmin
        SuperAdminCommon::createSuperAdmin();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription_items');
        Schema::dropIfExists('subscriptions');

        DB::statement("ALTER TABLE `subscription_plans` CHANGE COLUMN `max_users` `max_users` INT UNSIGNED NOT NULL DEFAULT 0  COMMENT '' AFTER `monthly_price`;");

        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('white_label_completed');
        });
    }
}
