<?php

Menu::create('admin-menu', function ($menu) {
    $menu->enableOrdering();
    $menu->setPresenter('Pingpong\Admin\Presenters\SidebarMenuPresenter');
    $menu->route('admin.home', trans('admin.menus.dashboard'), [], 0, ['icon' => 'fa fa-dashboard']);
    /*$menu->dropdown(trans('admin.menus.articles.title'), function ($sub) {
        $sub->route('admin.articles.index', trans('admin.menus.articles.all'), [], 1);
        $sub->route('admin.articles.create', trans('admin.menus.articles.create'), [], 2);
        $sub->divider(3);
        $sub->route('admin.categories.index', trans('admin.menus.categories'), [], 4);
    }, 1, ['icon' => 'fa fa-book']);*/
   /*  $menu->dropdown(trans('admin.menus.pages.title'), function ($sub) {
        $sub->route('admin.pages.index', trans('admin.menus.pages.all'), [], 1);
        $sub->route('admin.pages.create', trans('admin.menus.pages.create'), [], 2);
    }, 2, ['icon' => 'fa fa-flag']); */
   /*  $menu->dropdown(trans('admin.menus.users.title'), function ($sub) {
        $sub->route('admin.users.index', trans('admin.menus.users.all'), [], 1);
        $sub->route('admin.users.create', trans('admin.menus.users.create'), [], 2);
       $sub->divider(3);
        $sub->route('admin.roles.index', trans('admin.menus.roles'), [], 4);
        $sub->route('admin.permissions.index', trans('admin.menus.permissions'), [], 5); 
    }, 3, ['icon' => 'fa fa-users']); */
 
	/*$menu->dropdown(trans('admin.menus.categories.title'), function ($sub) {
        $sub->route('admin.categories.index', trans('admin.menus.categories.all'), [], 1);
        $sub->route('admin.categories.create', trans('admin.menus.categories.create'), [], 2);
    }, 4, ['icon' => 'fa fa-flag']);*/
	
	$menu->dropdown(trans('admin.menus.services.title'), function ($sub) {
        $sub->route('admin.services.index', trans('admin.menus.services.all'), [], 1);
       }, 4, ['icon' => 'fa fa-list']);
	
	/* $menu->dropdown(trans('Subcategories'), function ($sub) {
        $sub->route('admin.subcategories.index', ' Subcategories Listing', [], 1);
        $sub->route('admin.subcategories.create', 'Add Subcategories', [], 2);
    }, 5, ['icon' => 'fa fa-flag']); */
	/* $menu->dropdown('Services', function ($sub) {
        $sub->route('admin.services.index', 'Services Listing', [], 1);
        $sub->route('admin.services.create', 'Add Services', [], 2);
    }, 5, ['icon' => 'fa fa-flag']); */

   /*  $menu->dropdown('Service', function ($sub) {
        $sub->route('admin.categories.index', 'Service  Listing', ['type' => 'service'], 1);
     
    }, 5, ['icon' => 'fa fa-flag']); */
	$menu->dropdown(trans('admin.menus.questions.title'), function ($sub) {
        $sub->route('admin.questions.index',  trans('admin.menus.questions.all'), ['type' => 'question'], 1);
     
    }, 6, ['icon' => 'fa fa-question-circle']);
	
	$menu->dropdown(trans('admin.menus.answers.title'), function ($sub) {
        $sub->route('admin.answers.index',  trans('admin.menus.answers.all'), [], 1);
     
    }, 7, ['icon' => 'fa fa-list-alt']);
	
	/* $menu->dropdown('Questions Options', function ($sub) {
        $sub->route('admin.sqoptions.index', 'Questions  Listing', [], 1);
     
    }, 8, ['icon' => 'fa fa-flag']); */

});
