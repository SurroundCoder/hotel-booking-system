<?php

use App\Models\Staff;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('username', 255);
            $table->string('password', 255);
            $table->string('fullname', 255);
            $table->string('email', 255);
            $table->string('phone', 255);
            $table->tinyInteger('is_locked');
            $table->timestamps();
        });

        Staff::create([
            'username'  => 'owner',
            'password'  => Hash::make('123123123'),
            'fullname'  => '',
            'email'     => 'owner@owner.com',
            'phone'     => '08175456659',
            'is_locked' => 0,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
