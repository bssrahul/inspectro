<?php

Route::group(['prefix' => config('admin.prefix', 'admin'), 'namespace' => 'Pingpong\Admin\Controllers'], function () {
    Route::group(['before' => config('admin.filter.guest')], function () {
        Route::resource('login', 'LoginController', [
            'only' => ['index', 'store'],
            'names' => [
                'index' => 'admin.login.index',
                'store' => 'admin.login.store'
            ]
        ]);
    });

    Route::group(['before' => config('admin.filter.auth')], function () {
        Route::get('/', ['as' => 'admin.home', 'uses' => 'SiteController@index']);
        Route::get('/logout', ['as' => 'admin.logout', 'uses' => 'SiteController@logout']);

        // settings
        Route::get('settings', ['as' => 'admin.settings', 'uses' => 'SiteController@settings']);
        Route::post('settings', ['as' => 'admin.settings.update', 'uses' => 'SiteController@updateSettings']);

        Route::resource('articles', 'ArticlesController', [
            'except' => 'show',
            'names' => [
                'index' => 'admin.articles.index',
                'create' => 'admin.articles.create',
                'store' => 'admin.articles.store',
                'show' => 'admin.articles.show',
                'update' => 'admin.articles.update',
                'edit' => 'admin.articles.edit',
                'destroy' => 'admin.articles.destroy',
            ]
        ]);
		
		Route::resource('subscribers', 'SubscribersController', [
            'except' => 'show',
            'names' => [
                'index' => 'admin.subscribers.index',
				'destroy' => 'admin.subscribers.destroy',				
            ]
        ]);
		
		Route::resource('reviews', 'ReviewsController', [
            'except' => 'show',
            'names' => [
                'index' => 'admin.reviews.index',
				'destroy' => 'admin.reviews.destroy',				
            ]
        ]);
		
		Route::resource('universities', 'UniversitiesController', [
            'except' => 'show',
            'names' => [
                'index' => 'admin.universities.index',
                'create' => 'admin.universities.create',
                'store' => 'admin.universities.store',
                'show' => 'admin.universities.show',
                'update' => 'admin.universities.update',
                'edit' => 'admin.universities.edit',
                'destroy' => 'admin.universities.destroy',
            ]
        ]);
		
        Route::resource('pages', 'PagesController', [
            'except' => 'show',
            'names' => [
                'index' => 'admin.pages.index',
                'create' => 'admin.pages.create',
                'store' => 'admin.pages.store',
                'show' => 'admin.pages.show',
                'update' => 'admin.pages.update',
                'edit' => 'admin.pages.edit',
                'destroy' => 'admin.pages.destroy',
            ]
        ]);
		
		 Route::resource('blocks', 'BlocksController', [
            'except' => 'show',
            'names' => [
                'index' => 'admin.blocks.index',
                'create' => 'admin.blocks.create',
                'store' => 'admin.blocks.store',
                'show' => 'admin.blocks.show',
                'update' => 'admin.blocks.update',
                'edit' => 'admin.blocks.edit',
                'destroy' => 'admin.blocks.destroy',
            ]
        ]);
		/* Route::resource('statics', 'StaticsController', [
            'except' => 'show',
            'names' => [
                'index' => 'admin.statics.index',
                'create' => 'admin.statics.create',
                'store' => 'admin.statics.store',
                'show' => 'admin.statics.show',
                'update' => 'admin.statics.update',
                'edit' => 'admin.statics.edit',
                'destroy' => 'admin.statics.destroy',
            ]
        ]); */
        Route::resource('users', 'UsersController', [
            'except' => 'show',
            'names' => [
                'index' => 'admin.users.index',
                'create' => 'admin.users.create',
                'store' => 'admin.users.store',
                'show' => 'admin.users.show',
                'update' => 'admin.users.update',
                'edit' => 'admin.users.edit',
                'destroy' => 'admin.users.destroy',
                'search' => 'admin.users.search'
            ]
        ]);
        Route::resource('categories', 'CategoriesController', [
            'except' => 'show',
            'names' => [
                'index' => 'admin.categories.index',
                'create' => 'admin.categories.create',
                'store' => 'admin.categories.store',
                'show' => 'admin.categories.show',
                'update' => 'admin.categories.update',
                'edit' => 'admin.categories.edit',
				'destroy' => 'admin.categories.destroy',
            ]
        ]);
		
		Route::get('service/{id}', ['as' => 'admin.categories.services', 'uses' => 'CategoriesController@services']);
		Route::get('servicecreate/{id}', ['as' => 'admin.categories.servicecreate', 'uses' => 'CategoriesController@servicecreate']);
		
		
		Route::any('servicestore', ['as' => 'admin.categories.servicestore', 'uses' => 'CategoriesController@servicestore']);
		//Route::any('servicecreate', ['as' => 'admin.categories.servicecreate', 'uses' => 'CategoriesController@servicecreate']);
		Route::resource('subcategories', 'SubcategoriesController', [
            'except' => 'show',
            'names' => [
                'index' => 'admin.subcategories.index',
                'create' => 'admin.subcategories.create',
                'store' => 'admin.subcategories.store',
                'show' => 'admin.subcategories.show',
                'update' => 'admin.subcategories.update',
                'edit' => 'admin.subcategories.edit',
                'destroy' => 'admin.subcategories.destroy',
            ]
        ]);
		Route::resource('services', 'ServicesController', [
            'except' => 'show',
            'names' => [
                'index' => 'admin.services.index',
                'create' => 'admin.services.create',
                'store' => 'admin.services.store',
                'show' => 'admin.services.show',
                'update' => 'admin.services.update',
                'edit' => 'admin.services.edit',
                'destroy' => 'admin.services.destroy',
                
            ]
        ]);
		Route::resource('questions', 'QuestionsController', [
            'except' => 'show',
            'names' => [
                'index' => 'admin.questions.index',
                'create' => 'admin.questions.create',
                'store' => 'admin.questions.store',
                'show' => 'admin.questions.show',
                'update' => 'admin.questions.update',
                'edit' => 'admin.questions.edit',
                'destroy' => 'admin.questions.destroy',
            ]
        ]);
		Route::resource('answers', 'AnswersController', [
            'except' => 'show',
            'names' => [
                'index' => 'admin.answers.index',
                'create' => 'admin.answers.create',
                'store' => 'admin.answers.store',
                'show' => 'admin.answers.show',
                'update' => 'admin.answers.update',
                'edit' => 'admin.answers.edit',
                'destroy' => 'admin.answers.destroy',
            ]
        ]);
		Route::resource('quotes', 'QuotesController', [
            'except' => 'show',
            'names' => [
                'index' => 'admin.quotes.index',
                'create' => 'admin.quotes.create',
                'store' => 'admin.quotes.store',
                'show' => 'admin.quotes.show',
                'update' => 'admin.quotes.update',
                'edit' => 'admin.quotes.edit',
                'destroy' => 'admin.quotes.destroy',
                'request' => 'admin.quotes.request',
            ]
        ]);
		Route::resource('sqoptions', 'SqoptionsController', [
            'except' => 'show',
            'names' => [
                'index' => 'admin.sqoptions.index',
                'create' => 'admin.sqoptions.create',
                'store' => 'admin.sqoptions.store',
                'show' => 'admin.sqoptions.show',
                'update' => 'admin.sqoptions.update',
                'edit' => 'admin.sqoptions.edit',
                'option' => 'admin.sqoptions.option',
				'destroy' => 'admin.sqoptions.destroy',
              
            ]
        ]);
		
		//Route::post('/categories/create', ['as' => 'admin.categories.store', 'uses' => 'CategoriesController@store']);
        Route::resource('roles', 'RolesController', [
            'except' => 'show',
            'names' => [
                'index' => 'admin.roles.index',
                'create' => 'admin.roles.create',
                'store' => 'admin.roles.store',
                'show' => 'admin.roles.show',
                'update' => 'admin.roles.update',
                'edit' => 'admin.roles.edit',
                'destroy' => 'admin.roles.destroy',
            ]
        ]);
        Route::resource('permissions', 'PermissionsController', [
            'except' => 'show',
            'names' => [
                'index' => 'admin.permissions.index',
                'create' => 'admin.permissions.create',
                'store' => 'admin.permissions.store',
                'show' => 'admin.permissions.show',
                'update' => 'admin.permissions.update',
                'edit' => 'admin.permissions.edit',
                'destroy' => 'admin.permissions.destroy',
            ]
        ]);
		
	
	

        // backup & reset
        Route::get('backup/reset', ['as' => 'admin.reset', 'uses' => 'SiteController@reset']);
        Route::get('app/reinstall', ['as' => 'admin.reinstall', 'uses' => 'SiteController@reinstall']);
        Route::get('cache/clear', ['as' => 'admin.cache.clear', 'uses' => 'SiteController@clearCache']);
        Route::any('massbulk', ['as' => 'massbulk', 'uses' => 'BulkController@store']);
		Route::any('addUniversity', ['as' => 'addUniversity', 'uses' => 'UniversitiesController@addUniversity']);
        Route::any('search', ['as' => 'search', 'uses' => 'UsersController@search']);
    });
});
