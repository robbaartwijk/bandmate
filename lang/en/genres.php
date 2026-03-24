<?php

/**
 * Strings for the Genres module.
 * Used via __('genres.key')
 */
return [

    'title' => 'Genres',
    'add'   => 'Add genre',
    'edit'  => 'Edit Genre',
    'show'  => 'Genre Details',

    // Form labels & placeholders
    'name'               => 'Name',
    'name_placeholder'   => 'Genre name',
    'group'              => 'Group',
    'group_placeholder'  => 'Genre group (e.g. Rock, Jazz)',

    // Confirm dialog
    'delete_confirm' => 'Delete this genre?',

    // Flash messages
    'created' => 'Genre created.',
    'updated' => 'Genre updated.',
    'deleted' => 'Genre deleted.',

    // Record count — use trans_choice('genres.found', $count, ['count' => $count])
    'found' => ':count genre found|:count genres found',

];