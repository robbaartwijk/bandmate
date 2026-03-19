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
 
    /**
     * Number of times the job may be attempted.
     */
    public int $tries = 3;
 
    /**
     * Number of seconds to wait before retrying.
     */
    public int $backoff = 60;
 
    /**
     * Number of seconds the job can run before timing out.
     */
    public int $timeout = 120;
 
    public function __construct(
        public readonly EmailJob $emailJob
    ) {}
 
    public function handle(): void
    {
        // Mark the job as processing
        $this->emailJob->update([
            'status'     => 'processing',
            'started_at' => now(),
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
 
        // Mark completed — if every recipient failed, mark as failed
        $total = $this->emailJob->recipients()->count();
 
        $this->emailJob->update([
            'status'       => $failed === $total ? 'failed' : 'completed',
            'completed_at' => now(),
        ]);
    }
 
    /**
     * Handle a job failure (all retries exhausted).
     */
    public function failed(Throwable $exception): void
    {
        $this->emailJob->update([
            'status'       => 'failed',
            'completed_at' => now(),
        ]);
    }
}
 