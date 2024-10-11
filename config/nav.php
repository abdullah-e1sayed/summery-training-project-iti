<?php
return [

    [
        'route'=> 'dashboard.dashboard',
        'title'=> 'home',
        'active'=>'dashboard.dashboard',
    ],
    [
        'route'=> 'dashboard.users.index',
        'title'=> 'Users',
        'active'=>'dashboard.users.*',
    ],
    [
        'route'=> 'dashboard.books.index',
        'title'=> 'Books',
        'active'=>'dashboard.books.*',
    ],
    [
        'route'=> 'dashboard.borrowed-books',
        'title'=> 'Borrowed Books',
        'active'=>'dashboard.borrowed-books',
    ],


 
];