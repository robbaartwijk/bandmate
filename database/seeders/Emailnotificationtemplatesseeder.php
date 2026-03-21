<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmailTemplate;

class EmailNotificationTemplatesSeeder extends Seeder
{
    public function run(): void
    {
        $templates = [
            [
                'name'      => 'email_notification_acts',
                'subject'   => 'A new act just joined!',
                'body_html' => '<div style="background:#f4f4f0;padding:2rem;border-radius:8px;">
  <div style="max-width:560px;margin:0 auto;background:#ffffff;border-radius:8px;border:1px solid #e5e5e5;overflow:hidden;font-family:sans-serif;">
    <div style="background:#1D9E75;padding:2rem 2rem 1.5rem;">
      <p style="margin:0;font-size:13px;color:#9FE1CB;letter-spacing:0.04em;">NEW ON THE PLATFORM</p>
      <h1 style="margin:0.25rem 0 0;font-size:22px;font-weight:500;color:#ffffff;">A new act just joined!</h1>
    </div>
    <div style="padding:1.75rem 2rem;">
      <p style="margin:0 0 1rem;font-size:15px;color:#1a1a1a;line-height:1.7;">Hey there,</p>
      <p style="margin:0 0 1.5rem;font-size:15px;color:#1a1a1a;line-height:1.7;">We wanted to let you know that a new act has just been added to the platform:</p>
      <div style="background:#f9f9f7;border-left:3px solid #1D9E75;padding:1rem 1.25rem;margin:0 0 1.5rem;">
        <p style="margin:0;font-size:13px;color:#666;">Act name</p>
        <p style="margin:0.25rem 0 0;font-size:18px;font-weight:500;color:#1a1a1a;">{{act_name}}</p>
      </div>
      <p style="margin:0 0 1.5rem;font-size:15px;color:#1a1a1a;line-height:1.7;">Head over to the platform to check them out, explore their profile, and see if they\'re a good fit for your next booking.</p>
      <a href="{{act_url}}" style="display:inline-block;background:#1D9E75;color:#ffffff;text-decoration:none;font-size:14px;font-weight:500;padding:0.6rem 1.4rem;border-radius:6px;">View act</a>
    </div>
    <div style="border-top:1px solid #e5e5e5;padding:1.25rem 2rem;">
      <p style="margin:0 0 0.5rem;font-size:12px;color:#999;line-height:1.6;">You\'re receiving this because you subscribed to act notifications. To manage your preferences, visit your account settings.</p>
      <p style="margin:0;font-size:12px;color:#999;line-height:1.6;">Can\'t click the button? Copy this link: <a href="{{act_url}}" style="color:#1D9E75;text-decoration:none;">{{act_url}}</a></p>
    </div>
  </div>
</div>',
                'body_text' => "Hey there,\n\nA new act has just been added to the platform: {{act_name}}.\n\nHead over to the platform to check them out:\n{{act_url}}\n\nYou're receiving this because you subscribed to act notifications.",
                'status'    => 'active',
            ],
            [
                'name'      => 'email_notification_vacancies',
                'subject'   => 'A new vacancy just opened up!',
                'body_html' => '<div style="background:#f4f4f0;padding:2rem;border-radius:8px;">
  <div style="max-width:560px;margin:0 auto;background:#ffffff;border-radius:8px;border:1px solid #e5e5e5;overflow:hidden;font-family:sans-serif;">
    <div style="background:#185FA5;padding:2rem 2rem 1.5rem;">
      <p style="margin:0;font-size:13px;color:#B5D4F4;letter-spacing:0.04em;">NEW VACANCY</p>
      <h1 style="margin:0.25rem 0 0;font-size:22px;font-weight:500;color:#ffffff;">A new vacancy just opened up!</h1>
    </div>
    <div style="padding:1.75rem 2rem;">
      <p style="margin:0 0 1rem;font-size:15px;color:#1a1a1a;line-height:1.7;">Hey there,</p>
      <p style="margin:0 0 1.5rem;font-size:15px;color:#1a1a1a;line-height:1.7;">A band is looking for a new member! Here are the details:</p>
      <div style="background:#f9f9f7;border-left:3px solid #185FA5;padding:1rem 1.25rem;margin:0 0 1.5rem;">
        <div style="margin-bottom:0.75rem;">
          <p style="margin:0;font-size:13px;color:#666;">Act</p>
          <p style="margin:0.25rem 0 0;font-size:16px;font-weight:500;color:#1a1a1a;">{{act_name}}</p>
        </div>
        <div style="border-top:1px solid #e5e5e5;padding-top:0.75rem;">
          <p style="margin:0;font-size:13px;color:#666;">Looking for</p>
          <p style="margin:0.25rem 0 0;font-size:16px;font-weight:500;color:#1a1a1a;">{{instrument_name}}</p>
        </div>
      </div>
      <p style="margin:0 0 1.5rem;font-size:15px;color:#1a1a1a;line-height:1.7;">Think you\'re the right fit? Check out the full vacancy and get in touch with the act directly.</p>
      <a href="{{vacancy_url}}" style="display:inline-block;background:#185FA5;color:#ffffff;text-decoration:none;font-size:14px;font-weight:500;padding:0.6rem 1.4rem;border-radius:6px;">View vacancy</a>
    </div>
    <div style="border-top:1px solid #e5e5e5;padding:1.25rem 2rem;">
      <p style="margin:0 0 0.5rem;font-size:12px;color:#999;line-height:1.6;">You\'re receiving this because you subscribed to vacancy notifications. To manage your preferences, visit your account settings.</p>
      <p style="margin:0;font-size:12px;color:#999;line-height:1.6;">Can\'t click the button? Copy this link: <a href="{{vacancy_url}}" style="color:#185FA5;text-decoration:none;">{{vacancy_url}}</a></p>
    </div>
  </div>
</div>',
                'body_text' => "Hey there,\n\nA band is looking for a new member!\n\nAct: {{act_name}}\nLooking for: {{instrument_name}}\n\nCheck out the full vacancy here:\n{{vacancy_url}}\n\nYou're receiving this because you subscribed to vacancy notifications.",
                'status'    => 'active',
            ],
            [
                'name'      => 'email_notification_availablemusicians',
                'subject'   => 'A musician is looking for a band!',
                'body_html' => '<div style="background:#f4f4f0;padding:2rem;border-radius:8px;">
  <div style="max-width:560px;margin:0 auto;background:#ffffff;border-radius:8px;border:1px solid #e5e5e5;overflow:hidden;font-family:sans-serif;">
    <div style="background:#7F77DD;padding:2rem 2rem 1.5rem;">
      <p style="margin:0;font-size:13px;color:#CECBF6;letter-spacing:0.04em;">AVAILABLE MUSICIAN</p>
      <h1 style="margin:0.25rem 0 0;font-size:22px;font-weight:500;color:#ffffff;">A musician is looking for a band!</h1>
    </div>
    <div style="padding:1.75rem 2rem;">
      <p style="margin:0 0 1rem;font-size:15px;color:#1a1a1a;line-height:1.7;">Hey there,</p>
      <p style="margin:0 0 1.5rem;font-size:15px;color:#1a1a1a;line-height:1.7;">A new musician has listed themselves as available and is actively looking to join a band:</p>
      <div style="background:#f9f9f7;border-left:3px solid #7F77DD;padding:1rem 1.25rem;margin:0 0 1.5rem;">
        <div style="margin-bottom:0.75rem;">
          <p style="margin:0;font-size:13px;color:#666;">Musician</p>
          <p style="margin:0.25rem 0 0;font-size:16px;font-weight:500;color:#1a1a1a;">{{musician_name}}</p>
        </div>
        <div style="border-top:1px solid #e5e5e5;padding-top:0.75rem;margin-bottom:0.75rem;">
          <p style="margin:0;font-size:13px;color:#666;">Instrument</p>
          <p style="margin:0.25rem 0 0;font-size:16px;font-weight:500;color:#1a1a1a;">{{instrument_name}}</p>
        </div>
        <div style="border-top:1px solid #e5e5e5;padding-top:0.75rem;">
          <p style="margin:0;font-size:13px;color:#666;">Genre</p>
          <p style="margin:0.25rem 0 0;font-size:16px;font-weight:500;color:#1a1a1a;">{{genre_name}}</p>
        </div>
      </div>
      <p style="margin:0 0 1.5rem;font-size:15px;color:#1a1a1a;line-height:1.7;">Looking to fill a spot in your band? Check out their profile and get in touch.</p>
      <a href="{{musician_url}}" style="display:inline-block;background:#7F77DD;color:#ffffff;text-decoration:none;font-size:14px;font-weight:500;padding:0.6rem 1.4rem;border-radius:6px;">View musician</a>
    </div>
    <div style="border-top:1px solid #e5e5e5;padding:1.25rem 2rem;">
      <p style="margin:0 0 0.5rem;font-size:12px;color:#999;line-height:1.6;">You\'re receiving this because you subscribed to available musician notifications. To manage your preferences, visit your account settings.</p>
      <p style="margin:0;font-size:12px;color:#999;line-height:1.6;">Can\'t click the button? Copy this link: <a href="{{musician_url}}" style="color:#7F77DD;text-decoration:none;">{{musician_url}}</a></p>
    </div>
  </div>
</div>',
                'body_text' => "Hey there,\n\nA new musician is looking to join a band!\n\nMusician: {{musician_name}}\nInstrument: {{instrument_name}}\nGenre: {{genre_name}}\n\nCheck out their profile here:\n{{musician_url}}\n\nYou're receiving this because you subscribed to available musician notifications.",
                'status'    => 'active',
            ],
            [
                'name'      => 'email_notification_rehearsalrooms',
                'subject'   => 'A new rehearsal room is available!',
                'body_html' => '<div style="background:#f4f4f0;padding:2rem;border-radius:8px;">
  <div style="max-width:560px;margin:0 auto;background:#ffffff;border-radius:8px;border:1px solid #e5e5e5;overflow:hidden;font-family:sans-serif;">
    <div style="background:#BA7517;padding:2rem 2rem 1.5rem;">
      <p style="margin:0;font-size:13px;color:#FAC775;letter-spacing:0.04em;">NEW REHEARSAL ROOM</p>
      <h1 style="margin:0.25rem 0 0;font-size:22px;font-weight:500;color:#ffffff;">A new rehearsal room is available!</h1>
    </div>
    <div style="padding:1.75rem 2rem;">
      <p style="margin:0 0 1rem;font-size:15px;color:#1a1a1a;line-height:1.7;">Hey there,</p>
      <p style="margin:0 0 1.5rem;font-size:15px;color:#1a1a1a;line-height:1.7;">A new rehearsal room has just been listed on the platform:</p>
      <div style="background:#f9f9f7;border-left:3px solid #BA7517;padding:1rem 1.25rem;margin:0 0 1.5rem;">
        <div style="margin-bottom:0.75rem;">
          <p style="margin:0;font-size:13px;color:#666;">Name</p>
          <p style="margin:0.25rem 0 0;font-size:16px;font-weight:500;color:#1a1a1a;">{{rehearsalroom_name}}</p>
        </div>
        <div style="border-top:1px solid #e5e5e5;padding-top:0.75rem;">
          <p style="margin:0;font-size:13px;color:#666;">Location</p>
          <p style="margin:0.25rem 0 0;font-size:16px;font-weight:500;color:#1a1a1a;">{{rehearsalroom_city}}</p>
        </div>
      </div>
      <p style="margin:0 0 1.5rem;font-size:15px;color:#1a1a1a;line-height:1.7;">Need a place to practice? Check out the full listing for availability, pricing, and contact details.</p>
      <a href="{{rehearsalroom_url}}" style="display:inline-block;background:#BA7517;color:#ffffff;text-decoration:none;font-size:14px;font-weight:500;padding:0.6rem 1.4rem;border-radius:6px;">View rehearsal room</a>
    </div>
    <div style="border-top:1px solid #e5e5e5;padding:1.25rem 2rem;">
      <p style="margin:0 0 0.5rem;font-size:12px;color:#999;line-height:1.6;">You\'re receiving this because you subscribed to rehearsal room notifications. To manage your preferences, visit your account settings.</p>
      <p style="margin:0;font-size:12px;color:#999;line-height:1.6;">Can\'t click the button? Copy this link: <a href="{{rehearsalroom_url}}" style="color:#BA7517;text-decoration:none;">{{rehearsalroom_url}}</a></p>
    </div>
  </div>
</div>',
                'body_text' => "Hey there,\n\nA new rehearsal room has just been listed on the platform!\n\nName: {{rehearsalroom_name}}\nLocation: {{rehearsalroom_city}}\n\nCheck out the full listing here:\n{{rehearsalroom_url}}\n\nYou're receiving this because you subscribed to rehearsal room notifications.",
                'status'    => 'active',
            ],
            [
                'name'      => 'email_notification_venues',
                'subject'   => 'A new venue just joined the platform!',
                'body_html' => '<div style="background:#f4f4f0;padding:2rem;border-radius:8px;">
  <div style="max-width:560px;margin:0 auto;background:#ffffff;border-radius:8px;border:1px solid #e5e5e5;overflow:hidden;font-family:sans-serif;">
    <div style="background:#0F6E56;padding:2rem 2rem 1.5rem;">
      <p style="margin:0;font-size:13px;color:#9FE1CB;letter-spacing:0.04em;">NEW VENUE</p>
      <h1 style="margin:0.25rem 0 0;font-size:22px;font-weight:500;color:#ffffff;">A new venue just joined the platform!</h1>
    </div>
    <div style="padding:1.75rem 2rem;">
      <p style="margin:0 0 1rem;font-size:15px;color:#1a1a1a;line-height:1.7;">Hey there,</p>
      <p style="margin:0 0 1.5rem;font-size:15px;color:#1a1a1a;line-height:1.7;">A new venue has just been listed on the platform:</p>
      <div style="background:#f9f9f7;border-left:3px solid #0F6E56;padding:1rem 1.25rem;margin:0 0 1.5rem;">
        <div style="margin-bottom:0.75rem;">
          <p style="margin:0;font-size:13px;color:#666;">Venue</p>
          <p style="margin:0.25rem 0 0;font-size:16px;font-weight:500;color:#1a1a1a;">{{venue_name}}</p>
        </div>
        <div style="border-top:1px solid #e5e5e5;padding-top:0.75rem;">
          <p style="margin:0;font-size:13px;color:#666;">Location</p>
          <p style="margin:0.25rem 0 0;font-size:16px;font-weight:500;color:#1a1a1a;">{{venue_city}}</p>
        </div>
      </div>
      <p style="margin:0 0 1.5rem;font-size:15px;color:#1a1a1a;line-height:1.7;">Looking for a great place to perform? Check out the full listing for capacity, facilities, and booking details.</p>
      <a href="{{venue_url}}" style="display:inline-block;background:#0F6E56;color:#ffffff;text-decoration:none;font-size:14px;font-weight:500;padding:0.6rem 1.4rem;border-radius:6px;">View venue</a>
    </div>
    <div style="border-top:1px solid #e5e5e5;padding:1.25rem 2rem;">
      <p style="margin:0 0 0.5rem;font-size:12px;color:#999;line-height:1.6;">You\'re receiving this because you subscribed to venue notifications. To manage your preferences, visit your account settings.</p>
      <p style="margin:0;font-size:12px;color:#999;line-height:1.6;">Can\'t click the button? Copy this link: <a href="{{venue_url}}" style="color:#0F6E56;text-decoration:none;">{{venue_url}}</a></p>
    </div>
  </div>
</div>',
                'body_text' => "Hey there,\n\nA new venue has just been listed on the platform!\n\nVenue: {{venue_name}}\nLocation: {{venue_city}}\n\nCheck out the full listing here:\n{{venue_url}}\n\nYou're receiving this because you subscribed to venue notifications.",
                'status'    => 'active',
            ],
            [
                'name'      => 'email_notification_agencies',
                'subject'   => 'A new agency just joined the platform!',
                'body_html' => '<div style="background:#f4f4f0;padding:2rem;border-radius:8px;">
  <div style="max-width:560px;margin:0 auto;background:#ffffff;border-radius:8px;border:1px solid #e5e5e5;overflow:hidden;font-family:sans-serif;">
    <div style="background:#993C1D;padding:2rem 2rem 1.5rem;">
      <p style="margin:0;font-size:13px;color:#F5C4B3;letter-spacing:0.04em;">NEW AGENCY</p>
      <h1 style="margin:0.25rem 0 0;font-size:22px;font-weight:500;color:#ffffff;">A new agency just joined the platform!</h1>
    </div>
    <div style="padding:1.75rem 2rem;">
      <p style="margin:0 0 1rem;font-size:15px;color:#1a1a1a;line-height:1.7;">Hey there,</p>
      <p style="margin:0 0 1.5rem;font-size:15px;color:#1a1a1a;line-height:1.7;">A new agency has just been listed on the platform:</p>
      <div style="background:#f9f9f7;border-left:3px solid #993C1D;padding:1rem 1.25rem;margin:0 0 1.5rem;">
        <div style="margin-bottom:0.75rem;">
          <p style="margin:0;font-size:13px;color:#666;">Agency</p>
          <p style="margin:0.25rem 0 0;font-size:16px;font-weight:500;color:#1a1a1a;">{{agency_name}}</p>
        </div>
        <div style="border-top:1px solid #e5e5e5;padding-top:0.75rem;">
          <p style="margin:0;font-size:13px;color:#666;">Location</p>
          <p style="margin:0.25rem 0 0;font-size:16px;font-weight:500;color:#1a1a1a;">{{agency_city}}</p>
        </div>
      </div>
      <p style="margin:0 0 1.5rem;font-size:15px;color:#1a1a1a;line-height:1.7;">Looking for representation or want to work with a new agency? Check out their profile for services, contact details, and the acts they represent.</p>
      <a href="{{agency_url}}" style="display:inline-block;background:#993C1D;color:#ffffff;text-decoration:none;font-size:14px;font-weight:500;padding:0.6rem 1.4rem;border-radius:6px;">View agency</a>
    </div>
    <div style="border-top:1px solid #e5e5e5;padding:1.25rem 2rem;">
      <p style="margin:0 0 0.5rem;font-size:12px;color:#999;line-height:1.6;">You\'re receiving this because you subscribed to agency notifications. To manage your preferences, visit your account settings.</p>
      <p style="margin:0;font-size:12px;color:#999;line-height:1.6;">Can\'t click the button? Copy this link: <a href="{{agency_url}}" style="color:#993C1D;text-decoration:none;">{{agency_url}}</a></p>
    </div>
  </div>
</div>',
                'body_text' => "Hey there,\n\nA new agency has just been listed on the platform!\n\nAgency: {{agency_name}}\nLocation: {{agency_city}}\n\nCheck out their profile here:\n{{agency_url}}\n\nYou're receiving this because you subscribed to agency notifications.",
                'status'    => 'active',
            ],
        ];

        foreach ($templates as $template) {
            EmailTemplate::updateOrCreate(
                ['name' => $template['name']],
                $template
            );
        }
    }
}