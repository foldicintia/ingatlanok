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
        Schema::create('ingatlanok', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('kategoria'); 
            $table->string('leiras'); 
            $table->date('hirdetesDatum')->default(now()); 
            $table->boolean('tehermentes')->default(true); 
            $table->integer('ar');
            $table->string('kepUrl')->nullable(); 
            $table->timestamps();

            $table->foreign('kategoria')->references('id')->on('kategoriak')->onDelete('cascade');
        });

        DB::table('ingatlanok')->insert(
            [
                'kategoria' => 1, 
                'leiras' => 'Családi ház a belvárosban',
                'hirdetesDatum' => now(),
                'tehermentes' => true,
                'ar' => 50000000,
                'kepUrl' => null,
            ],
            [
                'kategoria' => 2, 
                'leiras' => 'Lakás a belvárosban',
                'hirdetesDatum' => now(),
                'tehermentes' => false,
                'ar' => 30000000,
                'kepUrl' => null,
            ],
            [
                'kategoria' => 3, 
                'leiras' => 'Telek',
                'hirdetesDatum' => now(),
                'tehermentes' => true,
                'ar' => 15000000,
                'kepUrl' => null,
            ],
        ]);
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingatlanok');
    }
};
