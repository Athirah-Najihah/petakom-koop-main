<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'restock' => 'Restock',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'payments' => [
        'name' => 'Payments',
        'index_title' => 'Payments List',
        'new_title' => 'New Payment',
        'create_title' => 'Create Payment',
        'edit_title' => 'Edit Payment',
        'show_title' => 'Show Payment',
        'inputs' => [
            'user_id' => 'User',
            'receipt_id' => 'Receipt',
            'total_payment' => 'Total Payment',
            'total_price' => 'Total Price',
            'total_change' => 'Total Change',
        ],
    ],

    'products' => [
        'name' => 'Products',
        'index_title' => 'Products List',
        'new_title' => 'New Product',
        'create_title' => 'Create Product',
        'edit_title' => 'Edit Product',
        'restock_title' => 'Restock Product',
        'show_title' => 'Show Product',
        'inputs' => [
            'name' => 'Name',
            'brand' => 'Brand',
            'quantity' => 'Quantity',
            'price' => 'Price',
        ],
    ],

    'receipts' => [
        'name' => 'Receipts',
        'index_title' => 'Receipts List',
        'new_title' => 'New Receipt',
        'create_title' => 'Create Receipt',
        'edit_title' => 'Edit Receipt',
        'show_title' => 'Show Receipt',
        'inputs' => [
            'user_id' => 'User',
            'total_payment' => 'Total Payment',
            'total_price' => 'Total Price',
            'total_change' => 'Total Change',
        ],
    ],

    'rosters' => [
        'name' => 'Rosters',
        'index_title' => 'Rosters List',
        'new_title' => 'New Roster',
        'create_title' => 'Create Roster',
        'edit_title' => 'Edit Roster',
        'show_title' => 'Show Roster',
        'inputs' => [
            'user_id' => 'User',
            'day' => 'Day',
            'time' => 'Time',
        ],
    ],

    'sales' => [
        'name' => 'Sales',
        'index_title' => 'Sales List',
        'new_title' => 'New Sale',
        'create_title' => 'Create Sale',
        'edit_title' => 'Edit Sale',
        'show_title' => 'Show Sale',
        'inputs' => [
            'user_id' => 'User',
            'total_price' => 'Total Price',
        ],
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'matric_id' => 'Matric Id',
            'password' => 'Password',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
