<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('lastname')->nullable();
            $table->string('email')->unique();
            $table->integer('ci')->nullable();
            $table->integer('contacto');
            $table->boolean('suscripcion')->default(false);

            $table->unsignedBigInteger('rol_id')->default(2);
            $table->foreign('rol_id')->references('id')->on('rols');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'name' => 'Giusti',
                'lastname'=>'Villarroel',
                'email' => 'giusti.17@hotmail.com',
                'contacto' => '72501311',                
                'password' => Hash::make('17041989'),
                'suscripcion'=>true,
                'rol_id' => '1',                
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
