<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('partits', function (Blueprint $table) {
            $table->dropColumn('gols');
            $table->integer('gols_local')->nullable()->after('jornada');
            $table->integer('gols_visitant')->nullable()->after('gols_local');
        });
    }

    public function down(): void
    {
        Schema::table('partits', function (Blueprint $table) {
            $table->dropColumn(['gols_local', 'gols_visitant']);
            $table->integer('gols')->default(0);
        });
    }
};
