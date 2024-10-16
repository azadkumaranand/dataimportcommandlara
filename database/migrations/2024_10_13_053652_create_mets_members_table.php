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
        Schema::create('mets_members', function (Blueprint $table) {
            $table->id();
            $table->string('dpr_license')->nullable();
            $table->string('cpnum')->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('first_name', 100)->nullable();
            $table->char('mi', 30)->nullable();
            $table->text('address')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('zipcode', 100)->nullable();
            $table->char('region', 30)->nullable();
            $table->integer('modified_region')->default(0);
            $table->string('cell_no', 100)->nullable();
            $table->string('work_no', 100)->nullable();
            $table->string('fax', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('additional_region')->nullable();
            $table->string('membership_number')->nullable();
            $table->string('employer_name', 100)->nullable();
            $table->integer('employer_category')->default(0);
            $table->string('cca_number', 100)->nullable();
            $table->boolean('plant_doctor')->default(false);
            $table->boolean('no_email_blast')->default(false);
            $table->boolean('no_label')->default(false);
            $table->string('consulting_type', 100)->nullable();
            $table->string('member_year', 100)->nullable();
            $table->string('renewal_year', 100)->nullable();
            $table->string('year', 100)->nullable();
            $table->string('pd_code', 100)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('licensee_category', 100)->nullable();
            $table->date('course_date')->nullable();
            $table->string('pca', 100)->nullable();
            $table->string('pcacat', 100)->nullable();
            $table->string('pi', 100)->nullable();
            $table->string('picat', 100)->nullable();
            $table->string('qal', 100)->nullable();
            $table->string('qalcat', 100)->nullable();
            $table->string('qac', 100)->nullable();
            $table->string('qaccat', 100)->nullable();
            $table->date('mrrnew')->nullable();
            $table->dateTime('pmpupd')->nullable();
            $table->string('hours', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mets_members');
    }
};
