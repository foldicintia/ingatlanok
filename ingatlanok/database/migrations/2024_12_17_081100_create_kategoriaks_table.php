<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('kategoriak', function (Blueprint $table) {
            $table->id();
            $table->string('nev')->nullable();
            $table->timestamps();
        });


        DB::table('kategoriak')->insert([
            ['nev' => 'Ház'],
            ['nev' => 'Lakás'],
            ['nev' => 'Telek'],
            ['nev' => 'Ipari terület'],
            ['nev' => 'Mezőgazdasági terület'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoriak');
    }
};
