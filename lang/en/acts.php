<?php

/**
 * Strings for the Acts module (index, create, edit, show).
 * Used via __('acts.key')
 */
return [

    // ── Page titles & headings ────────────────────────────────────────────
    'title'  => 'Acts',
    'add'    => 'Add act',
    'edit'   => 'Edit Act',
    'show'   => 'Act Details',

    // ── Toolbar ───────────────────────────────────────────────────────────
    'show_all'    => 'Show all acts',
    'show_my'     => 'Show only my acts',
    'per_page_25' => '25 acts',
    'per_page_50' => '50 acts',
    'per_page_100'=> '100 acts',

    // ── Sort options (act-specific) ───────────────────────────────────────
    'sort_by_genre'       => 'Sort by genre',
    'sort_by_description' => 'Sort by description',

    // ── Table columns ─────────────────────────────────────────────────────
    'col_name'        => 'Name',
    'col_members'     => 'Members',
    'col_genre'       => 'Genre',
    'col_description' => 'Description',

    // ── Form labels & placeholders ────────────────────────────────────────
    'name'                    => 'Act name',
    'name_placeholder'        => 'Act name',
    'members'                 => 'Number of members',
    'members_placeholder'     => 'Number of members',
    'description'             => 'Description',
    'description_placeholder' => 'Describe the act...',
    'select_genre'            => 'Select genre',
    'is_private'              => 'Private act',

    // ── Form sections ─────────────────────────────────────────────────────
    'contact_info'  => 'Contact information',
    'social_links'  => 'Social media & links',
    'media_section' => 'Media',
    'upload_image'  => 'Upload image',
    'upload_music'  => 'Upload audio',
    'upload_video'  => 'Upload video',

    // ── Social link labels ────────────────────────────────────────────────
    'email_label'     => 'Email',
    'phone_label'     => 'Phone',
    'website_label'   => 'Website',
    'facebook_label'  => 'Facebook',
    'youtube_label'   => 'YouTube',
    'twitter_label'   => 'Twitter',
    'instagram_label' => 'Instagram',
    'soundcloud_label'=> 'SoundCloud',
    'spotify_label'   => 'Spotify',
    'bluesky_label'   => 'Bluesky',
    'video_demo_label'=> 'Video demo',

    // ── Confirm dialog ────────────────────────────────────────────────────
    'delete_confirm' => 'Delete this act?',

    // ── Flash messages ────────────────────────────────────────────────────
    'created' => 'Act created.',
    'updated' => 'Act updated.',
    'deleted' => 'Act deleted.',

    // ── Record count (use trans_choice) ───────────────────────────────────
    // Usage: trans_choice('acts.found', $count, ['count' => $count])
    'found' => ':count act found|:count acts found',

];