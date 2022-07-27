<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'profile_id')) {
                $table->foreignId('profile_id')->nullable()->constraited('profiles');
            }
            if (!Schema::hasColumn('users', 'entreprise_id')) {
                $table->foreignId('entreprise_id')->nullable()->constraited('entreprises');
            }
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('profile_id');
                $table->dropColumn('entreprise_id');
            });
        }
    }
};
