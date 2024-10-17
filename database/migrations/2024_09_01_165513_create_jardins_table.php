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
        Schema::create('jardins', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('localisation');
            $table->string('type');
            $table->float('surface');
            $table->integer('etat')->default(0);
            $table->string('photo',300);
            $table->foreignId('utilisateur_id')->constrained('users');
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
        Schema::dropIfExists('jardins');
    }
};
