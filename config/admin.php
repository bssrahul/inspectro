<?php

return [
    'prefix' => 'admin',
    'filter' => [
        'auth' => 'admin.auth',
        'guest' => 'admin.guest',
    ],
    'views' => [
        'layout' => 'admin::layouts.master',
        'post' => 'admin::article'
    ],
    'article' => [
        'model' => 'Pingpong\Admin\Entities\Article',
        'perpage' => 10
    ],
	'university' => [
        'model' => 'Pingpong\Admin\Entities\University',
        'perpage' => 50
    ],
	'review' => [
        'model' => 'Pingpong\Admin\Entities\Review',
        'perpage' => 50
    ],
    'subscriber' => [
        'model' => 'Pingpong\Admin\Entities\Subscriber',
        'perpage' => 10
    ],

    'subcategory' => [
        'model' => 'Pingpong\Admin\Entities\Subcategory',
        'perpage' => 10
    ],

	
	'sqoption' => [
        'model' => 'Pingpong\Admin\Entities\Sqoption',
        'perpage' => 10
    ],
	

    'page' => [
        'perpage' => 10
    ],
    'user' => [
        'model' => 'Pingpong\Admin\Entities\User',
        'perpage' => 100
    ],
    'role' => [
        'model' => 'Pingpong\Admin\Entities\Role',
        'perpage' => 10
    ],
    'permission' => [
        'model' => 'Pingpong\Admin\Entities\Permission',
        'perpage' => 10
    ],
    'category' => [
        'model' => 'Pingpong\Admin\Entities\Category',
        'perpage' => 10
    ],
    'service' => [
        'model' => 'Pingpong\Admin\Entities\Service',
        'perpage' => 10
    ],
	'question' => [
        'model' => 'Pingpong\Admin\Entities\Question',
        'perpage' => 10
    ],
	'answer' => [
        'model' => 'Pingpong\Admin\Entities\Answer',
        'perpage' => 10
    ],
	'quote' => [
        'model' => 'Pingpong\Admin\Entities\Quote',
        'perpage' => 10
    ],
];
