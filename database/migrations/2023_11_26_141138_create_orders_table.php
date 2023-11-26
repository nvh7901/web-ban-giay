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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->index()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('province_id')->index()->unsigned();
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->bigInteger('district_id')->index()->unsigned();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->bigInteger('ward_id')->index()->unsigned();
            $table->foreign('ward_id')->references('id')->on('wards')->onDelete('cascade');

            $table->string('ship_name');
            $table->string('ship_email');
            $table->string('ship_phone');
            $table->string('ship_address');
            $table->integer('post_code')->nullable()->index();
            $table->text('notes')->nullable();
            $table->string('payment_type');
            $table->string('payment_method')->nullable();
            $table->string('amount')->index();
            $table->string('invoice_no');
            $table->string('order_date');
            $table->string('order_month');
            $table->string('order_year');
            $table->string('confirmed_date')->nullable();
            $table->string('processing_date')->nullable();
            $table->string('picked_date')->nullable();
            $table->string('shipped_date')->nullable();
            $table->string('delivered_date')->nullable();
            $table->string('cancel_date')->nullable();
            $table->string('return_date')->nullable();
            $table->string('return_reason')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('orders');
    }
};
