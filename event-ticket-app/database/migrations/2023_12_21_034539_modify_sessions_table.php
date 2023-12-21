<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // event-ticket-app/database/migrations/2023_12_21_034539_modify_sessions_table.php
        Schema::table('sessions', function (Blueprint $table) {
            if (Schema::hasColumn('sessions', 'user_id') && !Schema::hasColumn('sessions', 'username')) {
                $table->renameColumn('user_id', 'username');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // event-ticket-app/database/migrations/2023_12_21_034539_modify_sessions_table.php
        Schema::table('sessions', function (Blueprint $table) {
            if (Schema::hasColumn('sessions', 'username') && !Schema::hasColumn('sessions', 'user_id')) {
                $table->renameColumn('username', 'user_id');
            }
        });
    }
}
