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
            $table->string('uuid');
            $table->string('biztory_id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->decimal('sales_target_amount', 9, 2);
            $table->string('addr');
            $table->string('city');
            $table->string('zip');
            $table->string('state');
            $table->string('country');
            $table->string('phone', 20);
            $table->char('locale', 3)->default('en');
            $table->string('remember_token');
            $table->string('confirmation_code')->default('0');
            $table->integer('has_login');
            $table->integer('branch_id');
            $table->timestamps();
            $table->softDeletes();
            $table->tinyInteger('has_changed_biztory_id');
            $table->unsignedTinyInteger('is_owner');
            $table->unsignedTinyInteger('read_only');
            $table->tinyInteger('performance_digest_email');
            $table->tinyInteger('sales_target_email');
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
