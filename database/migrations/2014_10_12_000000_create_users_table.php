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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('role_id')->unsigned();
            $table->string('role_type');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('is_admin', ['0', '1'])
                ->default('0')->comment('0 = notAdmin, 1 = Admin');
            $table->enum('is_delete', ['0', '1'])
                ->default('0')->comment('0 = notDeleted, 1 = Deleted');
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
};
