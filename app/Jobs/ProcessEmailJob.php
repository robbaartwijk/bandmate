<?php
 
namespace App\Jobs;
 
use App\Mail\TemplatedEmail;
use App\Models\EmailJob;
use App\Models\EmailLog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Throwable;
 
class ProcessEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
 
    public int $tries = 3;
    public int $backoff = 60;
    public int $timeout = 120;
 
    public function __construct(
        public readonly EmailJob $emailJob
    ) {}
 
    public function handle(): void
    {
        // Mark the job as processing.
        // Only set started_at on the first attempt so retries don't overwrite
        // the original start time.
        $this->emailJob->update([
            'status'     => 'processing',
            'started_at' => $this->emailJob->started_at ?? now(),
        ]);
 
        $failed = 0;
 
        foreach ($this->emailJob->recipients as $recipient) {
            // Skip recipients that already have a log entry (e.g. from a previous retry)
            if ($recipient->log) {
                continue;
            }
 
            try {
                Mail::send(new TemplatedEmail($recipient));
 
                EmailLog::create([
                    'recipient_id' => $recipient->id,
                    'status'       => 'sent',
                    'sent_at'      => now(),
                ]);
 
            } catch (Throwable $e) {
                $failed++;
 
                EmailLog::create([
                    'recipient_id'  => $recipient->id,
                    'status'        => 'failed',
                    'error_message' => $e->getMessage(),
                    'failed_at'     => now(),
                ]);
            }
        }
 
        // Use the already-loaded collection (property, not method) to avoid a
        // redundant COUNT query after the foreach has already hydrated it.
        $total = $this->emailJob->recipients->count();
 
        $this->emailJob->update([
            'status'       => $failed === $total ? 'failed' : 'completed',
            'completed_at' => now(),
        ]);
    }
 
    public function failed(Throwable $exception): void
    {
        $this->emailJob->update([
            'status'       => 'failed',
            'completed_at' => now(),
        ]);
    }
}