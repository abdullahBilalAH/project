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
            $table->id('orderID'); // معرّف الطلب
            $table->json('items')->nullable(); // عناصر الطلب كمصفوفة JSON
            $table->decimal('order_value', 10, 2); // قيمة الطلب
            $table->string('address'); // العنوان
            $table->string('phoneNumber'); // رقم الهاتف
            $table->timestamps(); // توقيت الإنشاء والتعديل
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
