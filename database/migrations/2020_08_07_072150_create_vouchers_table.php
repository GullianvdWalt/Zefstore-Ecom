<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Voucher Migration to create table with attributes

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create Table vouchers
        Schema::create('vouchers', function (Blueprint $table) {
            // vouchers table attributes
            $table->id();
            $table->string('code')->unique();
            $table->string('type');
            $table->integer('value')->nullable();
            $table->integer('percentage_off')->nullable();
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
        Schema::dropIfExists('vouchers');
    }
}
