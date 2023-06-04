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
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('id_class')->required()->after('gender');
            $table->foreign('id_class')->references('id')->on('class')->onDelete('restrict'); // restrict = kita tidak bisa menghapus data di tabel class jika di tabel student ada data yang terhubung
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['id_class']);
            $table->dropColumn('id_class');
        });
    }
};
