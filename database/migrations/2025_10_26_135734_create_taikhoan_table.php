<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('taikhoan', function (Blueprint $table) {
            $table->increments('IDtaiKhoan');
            $table->integer('IDnguoiDung')->unsigned();
            $table->string('email', 255);
            $table->string('password', 255);
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('IDnguoiDung')
                ->references('IDNguoiDung')
                ->on('nguoi')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('taikhoan');
    }
};
