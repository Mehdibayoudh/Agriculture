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
        Schema::create('plantes', function (Blueprint $table) {
            $table->id(); // Identifiant unique
            $table->string('nom'); // Nom de la plante
            $table->string('type'); // Type de plante
            $table->text('besoins'); // Besoins en eau et en lumière
            $table->foreignId('jardin_id')->constrained(); // Référence au jardin
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantes');
    }
};
