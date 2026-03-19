<?php
 
namespace App\Providers;
 
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
 
use App\Models\User;
use App\Policies\UserPolicy;

use App\Models\EmailTemplate;
use App\Models\EmailJob;
use App\Models\EmailJobRecipient;
use App\Models\EmailLog;
 
use App\Policies\EmailTemplatePolicy;
use App\Policies\EmailJobPolicy;
use App\Policies\EmailJobRecipientPolicy;
use App\Policies\EmailLogPolicy;
 
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        EmailTemplate::class     => EmailTemplatePolicy::class,
        EmailJob::class          => EmailJobPolicy::class,
        EmailJobRecipient::class => EmailJobRecipientPolicy::class,
        EmailLog::class          => EmailLogPolicy::class,
        User::class              => UserPolicy::class,
    ];
 
    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
 
        // Example: grant admins access to everything, bypassing all policy checks.
        // Remove or adjust this if you want fine-grained control per policy.
        Gate::before(function ($user, $ability) {
            if ($user->is_admin) {
                return true;
            }
        });
    }
}