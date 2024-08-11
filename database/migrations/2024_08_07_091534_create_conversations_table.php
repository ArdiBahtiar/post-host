<?php

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
        // Schema::create('conversations', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('user_one_id')->constrained('users')->onDelete('cascade');
        //     $table->foreignId('user_two_id')->constrained('users')->onDelete('cascade');
        //     $table->timestamps();
        // });
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->string('user_one_id');
            $table->string('user_two_id');
            $table->timestamps();
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreignId('conversation_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversations');

        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['conversation_id']);
            $table->dropColumn('conversation_id');
        });
    }
};
