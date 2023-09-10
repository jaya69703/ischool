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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            // IDENTITAS ACCOUNT
            $table->string('staff_name');
            $table->string('staff_nitk')->nullable();
            $table->integer('divisi_id');
            $table->integer('position_id');
            $table->date('staff_start')->nullable();
            $table->date('staff_end')->nullable();
            $table->integer('staff_sknumber')->nullable();

            // PRIVATE DATA
            $table->string('staff_niknumber')->nullable();
            $table->string('staff_kknumber')->nullable();
            $table->string('staff_email');
            $table->string('staff_phone');
            $table->string('staff_placebirth')->nullable();
            $table->date('staff_datebirth')->nullable();
            $table->string('staff_gender')->nullable();
            $table->string('staff_religion')->nullable();

            // KONTAK DARURAT
            $table->string('staff_mother')->nullable();
            $table->string('staff_phonemother')->nullable();
            $table->string('staff_father')->nullable();
            $table->string('staff_phonefather')->nullable();
            $table->string('staff_wali')->nullable();
            $table->string('staff_phonewali')->nullable();
            
            // DATA DOKUMEN STAFF
            $table->string('docs_ktp')->nullable();
            $table->string('docs_kk')->nullable();
            $table->string('docs_akta')->nullable();
            $table->string('docs_npwp')->nullable();
            $table->string('docs_bpjs')->nullable();
            $table->string('docs_ijazah')->nullable();
            $table->string('docs_serti_0')->nullable();
            $table->string('docs_serti_1')->nullable();
            $table->string('docs_serti_2')->nullable();
            
            // SPECIAL IDENTITY
            $table->string('code', 6);

            // UNDEFINED
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
