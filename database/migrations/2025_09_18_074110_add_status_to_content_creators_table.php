<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToContentCreatorsTable extends Migration
{
    public function up()
    {
        Schema::table('content_creators', function (Blueprint $table) {
            // Menambahkan kolom status dengan default 'pending'
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
        });git
    }

    public function down()
    {
        Schema::table('content_creators', function (Blueprint $table) {
            // Menghapus kolom status
            $table->dropColumn('status');
        });
    }
}
