<?php
 
namespace App\Mail;
 
use App\Models\EmailJobRecipient;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
 
class TemplatedEmail extends Mailable
{
    use Queueable, SerializesModels;
 
    public function __construct(
        public readonly EmailJobRecipient $recipient
    ) {}
 
    public function envelope(): Envelope
    {
        $job      = $this->recipient->job;
        $template = $job->template;
 
        return new Envelope(
            from: new \Illuminate\Mail\Mailables\Address(
                $job->from_address,
                $job->from_name
            ),
            to: [
                new \Illuminate\Mail\Mailables\Address(
                    $this->recipient->email,
                    $this->recipient->name
                )
            ],
            subject: $this->mergeVariables($template->subject),
        );
    }
 
    public function content(): Content
    {
        return new Content(
            htmlString: $this->mergeVariables(
                $this->recipient->job->template->body_html
            ),
            textString: $this->recipient->job->template->body_text
                ? $this->mergeVariables($this->recipient->job->template->body_text)
                : null,
        );
    }
 
    /**
     * Replace {{variable}} placeholders with per-recipient values.
     * Falls back to an empty string if the variable is not defined.
     */
    private function mergeVariables(string $content): string
    {
        $variables = $this->recipient->variables ?? [];
 
        return preg_replace_callback('/\{\{(\w+)\}\}/', function ($matches) use ($variables) {
            return $variables[$matches[1]] ?? '';
        }, $content);
    }
}
 