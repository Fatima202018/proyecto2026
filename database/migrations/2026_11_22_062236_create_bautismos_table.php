
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bautismos', function (Blueprint $table) {
            $table->id();

            // Identificación de la partida
            $table->string('numero_partida', 50);
            $table->string('libro', 50)->nullable();
            $table->string('folio', 50)->nullable();

            // Datos del bautizado
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('sexo', 20)->nullable();

            // Datos de nacimiento
            $table->date('fecha_nacimiento')->nullable();
            $table->string('lugar_nacimiento')->nullable();

            // Datos del sacramento
            $table->date('fecha_bautismo');
            $table->string('lugar_bautismo')->nullable();

            // Padres
            $table->string('nombre_padre')->nullable();
            $table->string('nombre_madre')->nullable();

            // Padrinos
            $table->string('nombre_padrino')->nullable();
            $table->string('nombre_madrina')->nullable();

            // Celebración y archivo
            $table->string('ministro_celebrante')->nullable();
            $table->text('observaciones')->nullable();
            $table->text('notas_marginales')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bautismos');
    }
};
