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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->longText("description");
            $table->integer("salary");
            $table->string("location");
            $table->enum('work_type', ['On-site', 'Remote', 'Hybrid']);
            $table->date("dead_line")->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected']);
            $table->foreignId("employee_id")->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId("category_id")->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
