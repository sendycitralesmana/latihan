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
        Schema::table('class', function (Blueprint $table) {
            $table->unsignedBigInteger('id_teacher')->nullable()->after('name');
            $table->foreign('id_teacher')->references('id')->on('teachers')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('class', function (Blueprint $table) {
            $table->dropForeign(['id_teacher']);
            $table->dropColumn('id_teacher');
        });
    }
};
