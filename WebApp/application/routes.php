<?php

$routes = array(

	'/' => '/main/index',
	'/index' => '/main/index',
	'/login' => '/login',
	'/login_confirm' => '/login/confirm_login',
	'/logout' => '/login/logout',
	'/signup' => '/registration/register', 
	'/edit_user' => '/users/edit',
	'/signup_confirm' => '/registration/confirm_registration',
	'/new_institution' => '/institutions/new_institution',
	'/edit_institution' => '/institutions/edit',
	'/delete_institution' => '/institutions/delete',
	'/add_institution' => '/institutions/add_institution',
	'/user' => '/users/user',
	'/institution' => '/institutions/institution',
	'/add_post' => '/posts/add_post',
	'/add_rating' => '/rating/add_rating',
	'/remove_post' => '/posts/remove_post',
	'/remove_rating' => '/rating/remove_rating',
	'/search' => '/institutions/search',

	# API

	'/api' => '/api/documentation',
	'/api/user' => '/api/user_data',
	'/api/institution' => '/api/institution_data',
	'/api/user/search' => '/api/find_users',
	'/api/institution/search' => '/api/find_institutions',
	'/api/institution/update' => '/api/update_institution',
	'/api/user/update' => '/api/update_user',
	'/api/institution/new' => '/api/new_institution',
	'/api/user/new' => '/api/signup',
	'/api/login' => '/api/login',
);
