<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id(); // Auto-incrementing UNSIGNED BIGINT (primary key) equivalent column
            $table->string('title', 64); // VARCHAR equivalent column with a length
            $table->date('date'); // DATE equivalent column
            $table->string('about', 256); // VARCHAR equivalent column with a length
            $table->text('description'); // TEXT equivalent column
            $table->decimal('price', 5, 2); // DECIMAL equivalent column with a precision and scale
            // $table->blob('image'); // MEDIUMBLOB equivalent column for binary data
            // Omitted the timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
