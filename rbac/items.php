<?php
return [
    'updateUser' => [
        'type' => 2,
        'description' => 'Update a user',
        'ruleName' => 'ownsProfile',
    ],
    'deleteUser' => [
        'type' => 2,
        'description' => 'Delete a user',
    ],
    'member' => [
        'type' => 1,
        'children' => [
            'updateUser',
        ],
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'deleteUser',
            'member',
        ],
    ],
];
