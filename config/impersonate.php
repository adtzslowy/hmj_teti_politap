<?php

return [
    'default_guard' => 'admin',
    'session_key' => 'impersonate',
    'take_redirect_to' => '/mahasiswa',
    'leave_redirect_to' => '/admin/impersonate',

    'guards' => [
        'admin',
        'mahasiswa',
    ],
];
