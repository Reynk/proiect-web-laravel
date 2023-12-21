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
            $table->id(); // Creates an 'id' column that is auto-incrementing
            $table->string('username', 64); // Creates a 'username' column with a VARCHAR type
            $table->string('event_title', 64); // Creates an 'event_title' column with a VARCHAR type
            $table->foreignId('event_id')->constrained('events'); // Creates a foreign key 'event_id' that references the 'id' column on the 'events' table
            $table->integer('price'); // Creates a 'price' column with an INTEGER type
            $table->integer('size'); // Creates a 'size' column with an INTEGER type
            
            // Assuming 'username' relates to the 'users' table, you'd set up a foreign key here.
            // This assumes that 'users' table has a 'username' column that you want to reference.
            // If 'username' is the primary key of the 'users' table, replace 'id' with 'username' in the referenced columns.
            $table->foreign('username')->references('username')->on('users')->onDelete('restrict')->onUpdate('restrict');
            
            // Timestamps are not included based on the provided schema
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
