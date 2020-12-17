<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserProfileToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('postal_code')->nullable();
            $table->string('address')->nullable();
            $table->string('address2')->nullable();
            $table->string('company')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('fax_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('postal_code');
            $table->dropColumn('address');
            $table->dropColumn('address2');
            $table->dropColumn('company');
            $table->dropColumn('phone_number');
            $table->dropColumn('fax_number');
        });
    }
}
