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
    Schema::create('notas', function (Blueprint $table) {
        $table->id();
        $table->string('titulo');
        $table->text('contenido');
        $table->string('imagen')->nullable(); // ruta de imagen
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('notas');
    }
};
