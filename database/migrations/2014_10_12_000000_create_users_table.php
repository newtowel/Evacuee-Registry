<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
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
            $table->bigIncrements('id');
            $table->uuid('id_for_qrcode');
            $table->string('shelter')->default('');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('name');
            $table->string('furigana');
            $table->string('sex');
            $table->string('district');
            $table->string('birth_date');
            $table->string('age');
            $table->string('address');
            $table->string('phone_number');
            $table->string('ec_phone_number');
            $table->string('ec_name');
            $table->string('ec_address');
            $table->string('relative_name1');
            $table->string('relative_name2');
            $table->string('relative_name3');
            $table->string('special_request');
            $table->string('disclosure_permission');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
