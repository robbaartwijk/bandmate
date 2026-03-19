<?php

namespace Database\Seeders;

use App\Models\EmailJob;
use App\Models\EmailJobRecipient;
use App\Models\EmailLog;
use App\Models\EmailTemplate;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmailSystemSeeder extends Seeder
{
    public function run(): void
    {
        // Create a test admin user if none exists
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name'     => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );

        // ----------------------------------------------------------------
        // Templates
        // ----------------------------------------------------------------

        $welcomeTemplate = EmailTemplate::create([
            'name'      => 'welcome_email',
            'subject'   => 'Welcome to our platform, {{first_name}}!',
            'status'    => 'active',
            'body_html' => <<<HTML
                <html>
                <body style="font-family: sans-serif; color: #333; padding: 24px;">
                    <h1 style="color: #4f46e5;">Welcome, {{first_name}}!</h1>
                    <p>Thanks for signing up. Your account is ready to go.</p>
                    <p>Your registered email is <strong>{{email}}</strong>.</p>
                    <a href="{{login_url}}"
                       style="display:inline-block;margin-top:16px;padding:10px 20px;background:#4f46e5;color:#fff;border-radius:6px;text-decoration:none;">
                        Log in now
                    </a>
                    <p style="margin-top:32px;font-size:12px;color:#999;">
                        If you did not create this account, please ignore this email.
                    </p>
                </body>
                </html>
                HTML,
            'body_text' => "Welcome, {{first_name}}!\n\nThanks for signing up. Log in here: {{login_url}}\n\nIf you did not create this account, please ignore this email.",
        ]);

        $newsletterTemplate = EmailTemplate::create([
            'name'      => 'monthly_newsletter',
            'subject'   => 'Your {{month}} update is here',
            'status'    => 'active',
            'body_html' => <<<HTML
                <html>
                <body style="font-family: sans-serif; color: #333; padding: 24px;">
                    <h1 style="color: #4f46e5;">{{month}} Newsletter</h1>
                    <p>Hi {{first_name}},</p>
                    <p>Here is your monthly update. We have been busy building new features just for you.</p>
                    <ul>
                        <li>Feature one — now live</li>
                        <li>Feature two — coming soon</li>
                        <li>Feature three — in beta</li>
                    </ul>
                    <p>Thanks for being with us,<br>The Team</p>
                </body>
                </html>
                HTML,
            'body_text' => "Hi {{first_name}},\n\nHere is your {{month}} update.\n\nThanks for being with us,\nThe Team",
        ]);

        $passwordResetTemplate = EmailTemplate::create([
            'name'      => 'password_reset',
            'subject'   => 'Reset your password',
            'status'    => 'active',
            'body_html' => <<<HTML
                <html>
                <body style="font-family: sans-serif; color: #333; padding: 24px;">
                    <h1 style="color: #4f46e5;">Reset your password</h1>
                    <p>Hi {{first_name}},</p>
                    <p>We received a request to reset your password. Click the button below to continue.</p>
                    <a href="{{reset_url}}"
                       style="display:inline-block;margin-top:16px;padding:10px 20px;background:#4f46e5;color:#fff;border-radius:6px;text-decoration:none;">
                        Reset password
                    </a>
                    <p style="margin-top:16px;font-size:12px;color:#999;">
                        This link expires in 60 minutes. If you did not request a reset, ignore this email.
                    </p>
                </body>
                </html>
                HTML,
            'body_text' => "Hi {{first_name}},\n\nReset your password here: {{reset_url}}\n\nThis link expires in 60 minutes.",
        ]);

        $draftTemplate = EmailTemplate::create([
            'name'      => 'upcoming_promotion',
            'subject'   => 'Something special is coming, {{first_name}}',
            'status'    => 'draft',
            'body_html' => '<html><body><p>Draft content coming soon.</p></body></html>',
            'body_text' => 'Draft content coming soon.',
        ]);

        // ----------------------------------------------------------------
        // Single email job — welcome email
        // ----------------------------------------------------------------

        $singleJob = EmailJob::create([
            'template_id'  => $welcomeTemplate->id,
            'type'         => 'single',
            'status'       => 'completed',
            'from_address' => 'no-reply@example.com',
            'from_name'    => 'My App',
            'created_by'   => $admin->id,
            'started_at'   => now()->subMinutes(10),
            'completed_at' => now()->subMinutes(9),
        ]);

        $singleRecipient = EmailJobRecipient::create([
            'job_id'     => $singleJob->id,
            'email'      => 'jan@example.com',
            'name'       => 'Jan de Vries',
            'variables'  => [
                'first_name' => 'Jan',
                'email'      => 'jan@example.com',
                'login_url'  => 'https://example.com/login',
            ],
        ]);

        EmailLog::create([
            'recipient_id' => $singleRecipient->id,
            'status'       => 'delivered',
            'message_id'   => 'msg_' . uniqid(),
            'sent_at'      => now()->subMinutes(9),
        ]);

        // ----------------------------------------------------------------
        // Bulk email job — newsletter
        // ----------------------------------------------------------------

        $bulkJob = EmailJob::create([
            'template_id'  => $newsletterTemplate->id,
            'type'         => 'bulk',
            'status'       => 'completed',
            'from_address' => 'newsletter@example.com',
            'from_name'    => 'My App Newsletter',
            'metadata'     => ['campaign' => 'march_2026_newsletter'],
            'created_by'   => $admin->id,
            'started_at'   => now()->subHour(),
            'completed_at' => now()->subMinutes(55),
        ]);

        $bulkRecipients = [
            ['email' => 'sophie@example.com',  'name' => 'Sophie Bakker',   'status' => 'delivered'],
            ['email' => 'thomas@example.com',  'name' => 'Thomas Visser',   'status' => 'opened'],
            ['email' => 'emma@example.com',    'name' => 'Emma Smit',       'status' => 'clicked'],
            ['email' => 'lucas@example.com',   'name' => 'Lucas Mulder',    'status' => 'bounced'],
            ['email' => 'olivia@example.com',  'name' => 'Olivia Jansen',   'status' => 'delivered'],
        ];

        foreach ($bulkRecipients as $data) {
            $recipient = EmailJobRecipient::create([
                'job_id'    => $bulkJob->id,
                'email'     => $data['email'],
                'name'      => $data['name'],
                'variables' => [
                    'first_name' => explode(' ', $data['name'])[0],
                    'month'      => 'March',
                ],
            ]);

            EmailLog::create([
                'recipient_id'  => $recipient->id,
                'status'        => $data['status'],
                'message_id'    => 'msg_' . uniqid(),
                'sent_at'       => $data['status'] !== 'failed' ? now()->subMinutes(55) : null,
                'failed_at'     => $data['status'] === 'failed' ? now()->subMinutes(55) : null,
                'error_message' => $data['status'] === 'bounced' ? 'Mailbox does not exist.' : null,
            ]);
        }

        // ----------------------------------------------------------------
        // Pending job — scheduled for the future
        // ----------------------------------------------------------------

        $pendingJob = EmailJob::create([
            'template_id'  => $passwordResetTemplate->id,
            'type'         => 'single',
            'status'       => 'pending',
            'from_address' => 'no-reply@example.com',
            'from_name'    => 'My App',
            'scheduled_at' => now()->addHours(2),
            'created_by'   => $admin->id,
        ]);

        EmailJobRecipient::create([
            'job_id'    => $pendingJob->id,
            'email'     => 'mark@example.com',
            'name'      => 'Mark van den Berg',
            'variables' => [
                'first_name' => 'Mark',
                'reset_url'  => 'https://example.com/reset?token=abc123',
            ],
        ]);

        $this->command->info('Email system seeded successfully.');
        $this->command->info('  - 4 templates (3 active, 1 draft)');
        $this->command->info('  - 1 completed single job');
        $this->command->info('  - 1 completed bulk job (5 recipients)');
        $this->command->info('  - 1 pending scheduled job');
        $this->command->info('  Admin login: admin@example.com / password');
    }
}