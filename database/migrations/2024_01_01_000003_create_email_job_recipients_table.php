<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('email_job_recipients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')
                  ->constrained('email_jobs')
                  ->cascadeOnDelete();
 
            $table->string('email');
            $table->string('name')->nullable();
 
            // Per-recipient template variables, e.g. {"first_name": "Jan", "order_id": "1234"}
            $table->json('variables')->nullable();
 
            $table->timestamp('created_at')->useCurrent();
 
            $table->index('job_id');
            $table->index('email');
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('email_job_recipients');
    }
};