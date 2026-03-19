<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('email_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('template_id')
                  ->constrained('email_templates')
                  ->restrictOnDelete();
 
            $table->enum('type', ['single', 'bulk'])->default('single');
            $table->enum('status', ['pending', 'processing', 'completed', 'failed', 'cancelled'])
                  ->default('pending');
 
            $table->string('from_address');
            $table->string('from_name')->nullable();
 
            // Arbitrary extra data: reply-to, tags, campaign name, etc.
            $table->json('metadata')->nullable();
 
            $table->timestamp('scheduled_at')->nullable();  // null = send immediately
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
 
            $table->timestamps();
 
            $table->index(['status', 'scheduled_at']);
            $table->index('type');
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('email_jobs');
    }
};