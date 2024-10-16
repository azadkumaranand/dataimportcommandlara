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
        Schema::create('mets_members_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->string('cpnum')->nullable();
            $table->integer('membership_year')->nullable();
            $table->date('paid_date')->nullable();
            $table->string('membership_type')->nullable();
            $table->char('assoccode', 1)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('member_id')->references('id')->on('mets_members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mets_members_infos');
    }
};
