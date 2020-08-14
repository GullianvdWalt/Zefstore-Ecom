<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            // Order Table Attributes
            $table->increments('id');
            $table->BigInteger('user_id')->unsigned()->nullable();
            // Define Foreign Key
            // If User Id is Null -> Guest otherwise, user has an account
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('set null');
            // Email
            $table->string('billing_email')->nullable();
            // Name & Surname
            $table->string('billing_fullname')->nullable();
            // Address
            $table->string('billing_address')->nullable();
            // City
            $table->string('billing_city')->nullable();
            // Province
            $table->string('billing_province')->nullable();
            // Postal Code
            $table->string('billing_postalcode')->nullable();
            // Phone
            $table->string('billing_phone')->nullable();
            // Card Information
            $table->string('billing_name_on_card')->nullable();
            // Voucher
            $table->integer('billing_discount')->default(0);
            $table->string('billing_discount_code')->nullable();
            // Totals
            $table->integer('billing_subtotal');
            $table->integer('billing_tax');
            $table->integer('billing_total');
            // Payment Processor Service Details
            // Stripe Details
            $table->string('payment_gateway')->default('stripe');
            $table->boolean('shipped')->default(false);
            // Form Error,, if its Null -> No Error, otherwise store error message
            $table->string('error')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
