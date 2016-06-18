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
    $menu->dropdown(trans('admin.menus.users.title'), function ($sub) {
        $sub->route('admin.users.index', trans('admin.menus.users.all'), [], 1);
        $sub->route('admin.users.create', trans('admin.menus.users.create'), [], 2);
       $sub->divider(3);
        $sub->route('admin.roles.index', trans('admin.menus.roles'), [], 4);
        $sub->route('admin.permissions.index', trans('admin.menus.permissions'), [], 5); 
    }, 3, ['icon' => 'fa fa-users']);
 
	/*$menu->dropdown(trans('admin.menus.categories.title'), function ($sub) {
        $sub->route('admin.categories.index', trans('admin.menus.categories.all'), [], 1);
        $sub->route('admin.categories.create', trans('admin.menus.categories.create'), [], 2);
    }, 4, ['icon' => 'fa fa-flag']);*/
	
	$menu->dropdown(trans('admin.menus.categories'), function ($sub) {
        $sub->route('admin.categories.index', 'Categories Listing', [], 1);
        $sub->route('admin.categories.create', 'Add Categories', [], 2);
    }, 4, ['icon' => 'fa fa-flag']);
	
	$menu->dropdown('Subcategories questions options', function ($sub) {
        $sub->route('admin.sqoptions.index', 'Subcategories questions options Listing', [], 1);
        $sub->route('admin.sqoptions.create', 'Add Subcategories questions options', [], 2);
    }, 5, ['icon' => 'fa fa-flag']);
});
