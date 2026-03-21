<?php

namespace App\Services;

use App\Jobs\ProcessEmailJob;
use App\Models\EmailJob;
use App\Models\EmailTemplate;
use App\Models\User;

class NotificationService {
    /**
    * Dispatch a notification email for a newly created module record.
    *
    * Collects every user subscribed to the module-specific list
    * ( e.g. email_notification_acts ) as well as every user subscribed
    * to email_notification_all, deduplicates by e-mail address so no
    * one receives the same message twice, then creates an EmailJob and
    * dispatches it through the existing queue infrastructure.
    *
    * @param  string               $templateName  The `name` column of the email_templates row
    *                                             ( e.g. 'email_notification_acts' ).
    * @param  string               $moduleColumn  The users table boolean column for the
    *                                             module-specific subscription
    *                                             ( e.g. 'email_notification_acts' ).
    * @param  array<string, mixed> $variables     Optional per-recipient template variables
    *                                             ( same value is used for every recipient ).
    * @return EmailJob|null  Returns null when the template is missing or there are no recipients.
    */

    public function dispatchModuleNotification(
        string $templateName,
        string $moduleColumn,
        array $variables = []
    ): ?EmailJob {
        $template = EmailTemplate::where( 'name', $templateName )
        ->where( 'status', 'active' )
        ->first();

        $moduleSubscribers = User::where($moduleColumn, true)
            ->whereNotNull('email')
            ->pluck('name', 'email');

        $allSubscribers = User::where('email_notification_all', true)
            ->whereNotNull('email')
            ->pluck('name', 'email');

        // Merge into a single deduplicated array keyed by email
        $recipients = $moduleSubscribers->merge($allSubscribers);

        if ( $recipients->isEmpty() ) {
            return null;
        }

        $emailJob = EmailJob::create( [
            'template_id'  => $template->id,
            'type'         => 'bulk',
            'from_address' => config( 'mail.from.address' ),
            'from_name'    => config( 'mail.from.name' ),
            'status'       => 'pending',
            'created_by'   => null,
        ] );

        foreach ($recipients as $email => $name) {
            $emailJob->recipients()->create([
                'email'     => $email,
                'name'      => $name,
                'variables' => $variables ?: null,
         ]);
    }

        ProcessEmailJob::dispatch( $emailJob );

        return $emailJob;
    }
}