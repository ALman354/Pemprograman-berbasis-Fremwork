<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            if (! Schema::hasColumn('mahasiswas', 'nama')) {
                $table->string('nama');
            }
            if (! Schema::hasColumn('mahasiswas', 'jenis_kelamin')) {
                $table->string('jenis_kelamin');
            }
            if (! Schema::hasColumn('mahasiswas', 'alamat')) {
                $table->string('alamat');
            }
            if (! Schema::hasColumn('mahasiswas', 'no_hp')) {
                $table->string('no_hp');
            }
        });
    }

    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $columns = array_filter(
                ['nama', 'jenis_kelamin', 'alamat', 'no_hp'],
                fn (string $column): bool => Schema::hasColumn('mahasiswas', $column)
            );

            if ($columns !== []) {
                $table->dropColumn($columns);
            }
        });
    }
};
