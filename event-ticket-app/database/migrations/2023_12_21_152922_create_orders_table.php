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
            $table->id(); 
            $table->string('username', 64); 
            $table->string('event_title', 64);
            $table->foreignId('event_id')->constrained('events');
            $table->integer('price'); 
            $table->integer('size'); 
            
            $table->foreign('username')->references('username')->on('users')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop foreign key constraints
            $table->dropForeign(['username']);
            $table->dropForeign(['event_id']);
        });

        Schema::dropIfExists('orders');
    }
}
