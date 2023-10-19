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
        Schema::create('daftars', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('nik');
            $table->string('nama',70);
            $table->string('tmpt_lhr',50);
            $table->date('tgl_lhir');
            $table->enum('jenkel',['Laki-Laki','Perempuan']);
            $table->enum('goldarah',['A','B','O','AB']);
            $table->text('alamat');
            $table->enum('agama',['Katholik','Kristen','Islam','Hindu','Budha','Konghucu']);
            $table->enum('status',['Kawin','Belum Kawin']);
            $table->string('pekerjaan',50);
            $table->enum('kewarga',['WNI','WNA']);
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
        Schema::dropIfExists('daftars');
    }
};
