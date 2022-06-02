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
            $table->id(); 
            $table->string('name'); //name
            $table->string('email')->unique(); //email
            $table->timestamp('email_verified_at')->nullable(); 
            $table->string('password'); // password
            $table->biginteger('numtel')->nullable(); 
            $table->string('adresse')->nullable(); 
            $table->date('date_recrutement')->nullable(); 
            $table->string('grade'); 
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
