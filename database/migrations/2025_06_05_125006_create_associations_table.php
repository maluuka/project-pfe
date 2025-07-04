<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 public function up()
{
    Schema::create('associations', function (Blueprint $table) {
        $table->id();
        $table->string('nom_complet');
        $table->string('email')->unique();
        $table->string('mot_de_passe');
        $table->string('telephone')->nullable();
        $table->text('adresse')->nullable();
        $table->text('description')->nullable();
        $table->date('date_inscription');
        $table->boolean('est_valide')->default(false);
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('associations');
    }
};
