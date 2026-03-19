<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('email_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();          // Internal identifier, e.g. "welcome_email"
            $table->string('subject');                 // Email subject line
            $table->longText('body_html');             // HTML version of the body
            $table->longText('body_text')->nullable(); // Plain-text fallback
            $table->enum('status', ['active', 'inactive', 'draft'])->default('draft');
            $table->timestamps();
            $table->softDeletes();
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('email_templates');
    }
};