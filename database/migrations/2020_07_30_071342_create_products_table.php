<?php
// Product Migration, used to create the product table
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Product Table Attribute
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            // Product Name
            $table->string('name')->unique();
            // Unique Identifier
            $table->string('slug')->unique();
            // Product Longer Sub Name
            $table->string('details')->nullable();
            $table->double('price');
            // Produt Description
            $table->text('description');
            $table->boolean('featured')->default(false)->nullable();
            $table->string('image')->default('products\August2020\no-image.jpeg')->nullable();
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
        Schema::dropIfExists('products');
    }
}
