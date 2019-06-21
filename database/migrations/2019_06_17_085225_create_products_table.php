<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 5, 2)->nullable();
            $table->string('url_image', 100);
            $table->enum('status', ['Publié', 'Brouillon']);//->default('Publié');
            $table->enum('code', ['Standard','Solde' ]);
            $table->string('reference', 16)->nullable();
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
