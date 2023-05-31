<?php

use App\Models\Szavak;
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
        Schema::create('szavaks', function (Blueprint $table) {
            $table->id();
            $table->string("angol", 50);
            $table->string("magyar", 50);
            $table->foreignId("temaId")->references("id")->on("temas");
            $table->timestamps();
        });

        Szavak::create(["angol" => "cat", "magyar" => "macska", "temaId" => 1]);
        Szavak::create(["angol" => "dog", "magyar" => "kutya", "temaId" => 1]);
        Szavak::create(["angol" => "bird", "magyar" => "madár", "temaId" => 1]);
        Szavak::create(["angol" => "fish", "magyar" => "hal", "temaId" => 1]);
        Szavak::create(["angol" => "ball", "magyar" => "labda", "temaId" => 2]);
        Szavak::create(["angol" => "apple", "magyar" => "alma", "temaId" => 2]);
        Szavak::create(["angol" => "box", "magyar" => "doboz", "temaId" => 2]);
        Szavak::create(["angol" => "house", "magyar" => "ház", "temaId" => 2]);
        Szavak::create(["angol" => "car", "magyar" => "kocsi", "temaId" => 2]);
        Szavak::create(["angol" => "red", "magyar" => "piros", "temaId" => 3]);
        Szavak::create(["angol" => "blue", "magyar" => "kék", "temaId" => 3]);
        Szavak::create(["angol" => "green", "magyar" => "zöld", "temaId" => 3]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('szavaks');
    }
};
