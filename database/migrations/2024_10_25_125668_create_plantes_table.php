<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('plantes', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nom'); // Name of the plant
            $table->text('description')->nullable(); // Description of the plant
            $table->integer('besoins_eau')->nullable(); // Water needs (could be a scale or a specific value)
            $table->string('image')->nullable(); // Image path
            $table->foreignId('categorie_id')->constrained('plante_categories')->onDelete('cascade'); // Foreign key to plante_categories
            $table->foreignId('jardin_id')->constrained('jardins')->onDelete('cascade'); // Foreign key to jardins
            $table->timestamps(); // Created at and updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('plantes');
    }
};
