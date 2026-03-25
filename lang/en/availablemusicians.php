<?php

/**
 * Strings for the Available Musicians module.
 * Used via __('availablemusicians.key')
 */
return [

    'title' => 'Available musicians',
    'add'   => 'Add available musician',
    'edit'  => 'Edit Available Musician',
    'show'  => 'Available Musician Details',

    // Form labels & placeholders
    'instrument'              => 'Instrument',
    'select_instrument'       => 'Select instrument',
    'genre'                   => 'Genre',
    'select_genre'            => 'Select genre',
    'description'             => 'Description',
    'description_placeholder' => 'Describe your skills and availability...',
    'available_from'          => 'Available from',
    'available_until'         => 'Available until',

    // Confirm dialog
    'delete_confirm' => 'Delete this available musician?',

    // Flash messages
    'created' => 'Available musician created.',
    'updated' => 'Available musician updated.',
    'deleted' => 'Available musician deleted.',

    // Record count — use trans_choice('availablemusicians.found', $count, ['count' => $count])
    'found' => ':count available musician found|:count available musicians found',

];