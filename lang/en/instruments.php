<?php

/**
 * Strings for the Instruments module.
 * Used via __('instruments.key')
 */
return [

    'title' => 'Instruments',
    'add'   => 'Add instrument',
    'edit'  => 'Edit Instrument',
    'show'  => 'Instrument Details',

    // Form labels & placeholders
    'name'              => 'Name',
    'name_placeholder'  => 'Instrument name',
    'type'              => 'Type',
    'type_placeholder'  => 'e.g. String, Wind, Percussion',

    // Confirm dialog
    'delete_confirm' => 'Delete this instrument?',

    // Flash messages
    'created' => 'Instrument created.',
    'updated' => 'Instrument updated.',
    'deleted' => 'Instrument deleted.',

    // Record count — use trans_choice('instruments.found', $count, ['count' => $count])
    'found' => ':count instrument found|:count instruments found',

];