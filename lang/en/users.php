<?php

/**
 * Strings for the User Management module (admin only).
 * Used via __('users.key')
 */
return [

    'title' => 'Users',
    'edit'  => 'Edit User',
    'show'  => 'User Details',

    // Table columns
    'col_name'       => 'Name',
    'col_email'      => 'Email',
    'col_role'       => 'Role',
    'col_registered' => 'Registered',

    // Role labels
    'role_admin' => 'Admin',
    'role_user'  => 'User',

    // Media
    'media_section' => 'Photo',
    'upload_image'  => 'Upload image',

    // Confirm dialog
    'delete_confirm' => 'Delete this user?',

    // Flash messages
    'updated' => 'User updated.',
    'deleted' => 'User deleted.',

    // Record count — use trans_choice('users.found', $count, ['count' => $count])
    'found' => ':count user found|:count users found',

];
