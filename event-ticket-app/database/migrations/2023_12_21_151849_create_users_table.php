<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Assuming 'username' is intended to be the primary key
            $table->string('username', 64)->unique(); // VARCHAR equivalent column with a length, marked as unique
            $table->string('password', 256); // VARCHAR equivalent column with a length
            $table->boolean('is_admin')->default(false); // TINYINT equivalent column, interpreted as boolean
            // Timestamps are omitted based on the previous context provided
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
