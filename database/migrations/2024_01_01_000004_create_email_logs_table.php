<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('email_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipient_id')
                  ->constrained('email_job_recipients')
                  ->cascadeOnDelete();
 
            $table->enum('status', ['sent', 'failed', 'bounced', 'delivered', 'opened', 'clicked'])
                  ->default('sent');
 
            // Provider message ID (Mailgun, SES, Postmark, etc.) for webhook matching
            $table->string('message_id')->nullable()->index();
 
            $table->text('error_message')->nullable();
 
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('failed_at')->nullable();
 
            $table->timestamp('created_at')->useCurrent();
 
            $table->index(['recipient_id', 'status']);
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('email_logs');
    }
};