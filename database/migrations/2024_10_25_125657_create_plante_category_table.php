<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('plante_categories', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nom'); // Name of the category
            $table->text('description')->nullable(); // Description of the category
            $table->string('type_sol')->nullable(); // Soil type
            $table->string('cycle_de_vie')->nullable(); // Life cycle
            $table->string('utilisation')->nullable(); // Usage
            $table->text('maladies_courantes')->nullable(); // Common diseases
            $table->string('image')->nullable(); // Image path
            $table->timestamps(); // Created at and updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('plante_categories');
    }
};