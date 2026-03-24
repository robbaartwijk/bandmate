<?php

/**
 * Strings for the Venues module.
 * Used via __('venues.key')
 */
return [

    'title' => 'Venues',
    'add'   => 'Add venue',
    'edit'  => 'Edit Venue',
    'show'  => 'Venue Details',

    // Form labels & placeholders
    'name'                    => 'Name',
    'name_placeholder'        => 'Venue name',
    'city'                    => 'City',
    'city_placeholder'        => 'City',
    'country'                 => 'Country',
    'country_placeholder'     => 'Country',
    'capacity'                => 'Capacity',
    'capacity_placeholder'    => 'Maximum capacity',
    'description'             => 'Description',
    'description_placeholder' => 'Describe the venue...',

    // Confirm dialog
    'delete_confirm' => 'Delete this venue?',

    // Flash messages
    'created' => 'Venue created.',
    'updated' => 'Venue updated.',
    'deleted' => 'Venue deleted.',

    // Record count — use trans_choice('venues.found', $count, ['count' => $count])
    'found' => ':count venue found|:count venues found',

];