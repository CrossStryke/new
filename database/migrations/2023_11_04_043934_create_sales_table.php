<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status');
            $table->string('ref_num', 50);
            $table->date('invoice_date');
            $table->date('delivery_date');
            $table->string('payee', 255);
            $table->mediumInteger('payee_id');
            $table->decimal('total', 12, 2);
            $table->string('currency', 3);
            $table->decimal('currency_total', 12, 2);
            $table->decimal('paid', 12, 2);
            $table->decimal('due', 12, 2);
            $table->decimal('rounding', 3, 2);
            $table->date('due_date');
            $table->string('attn', 200);
            $table->string('payment_term', 20);
            $table->tinyInteger('payment_status');
            $table->tinyInteger('delivery_status');
            $table->integer('branch_id');
            $table->tinyInteger('locked');
            $table->smallInteger('staff_id');
            $table->timestamps();
            $table->softDeletes();
            $table->smallInteger('author_id')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
