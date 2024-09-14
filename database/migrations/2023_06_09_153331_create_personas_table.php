<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->enum("tipo_de_documento", ['Cédula de ciudadanía','Tarjeta de identidad','Cédula de extranjería','Registro civil']);
            $table->string('numero_de_documento')->unique();
            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->date('fecha_de_nacimiento')->nullable();
            $table->enum('tipo_de_sangre',['O+','O-','A+','A-','B+','B-','AB+','AB-'])->nullable();
            $table->enum('genero', ['No registra','Masculino','Femenino'])->nullable();
            $table->enum('estrato_socioeconomico', ['No registra','1','2','3','4','5','6'])->nullable();
            $table->enum('estado_marital', ['No registra','Soltero(a)','Casado(a)','Separado(a)'])->nullable();
            $table->foreignId('eps_id')->constrained('eps')->onDelete('cascade')->nullable();
            $table->string('dirrecion')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('correo')->nullable();
            $table->string('telefono_1')->nullable();
            $table->string('telefono_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
