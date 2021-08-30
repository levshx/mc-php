<?php
if(!defined("MCPROJECT")){ exit("Hacking Attempt!"); }
return [
	// MainController
	'' => [
		'controller' => 'main',
		'action' => 'index',
	],
	'main/index/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'index',
	],
	'rules' => [
		'controller' => 'main',
		'action' => 'rules',
	],
	'servers' => [
		'controller' => 'main',
		'action' => 'servers',
	],
	// USER ROUTES
	'login' => [
		'controller' => 'user',
		'action' => 'login',
	],
	'logout' => [
		'controller' => 'user',
		'action' => 'logout',
	],
	'reg' => [
		'controller' => 'user',
		'action' => 'reg',		
	],
	'profile' => [
		'controller' => 'user',
		'action' => 'profile',		
	],
	// AdminController
	'admin/login' => [
		'controller' => 'admin',
		'action' => 'login',
	],
	'admin/logout' => [
		'controller' => 'admin',
		'action' => 'logout',
	],
	'admin' => [
		'controller' => 'admin',
		'action' => 'index',
	],
	'admin/addPost' => [
		'controller' => 'admin',
		'action' => 'addPost',
	],
	'admin/editPost/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'editPost',
	],
	'admin/deletePost/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'deletePost',
	],
	'admin/posts/{page:\d+}' => [
		'controller' => 'admin',
		'action' => 'posts',
	],
	'admin/posts' => [
		'controller' => 'admin',
		'action' => 'posts',
	],
	'admin/users/{page:\d+}' => [
		'controller' => 'admin',
		'action' => 'users',
	],
	'admin/users' => [
		'controller' => 'admin',
		'action' => 'users',
	],
	'admin/editUser/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'editUser',
	],
	'admin/servers' => [
		'controller' => 'admin',
		'action' => 'servers',
	],
	'admin/addServer' => [
		'controller' => 'admin',
		'action' => 'addServer',
	],
	'admin/editServer/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'editServer',
	],
	'admin/deleteServer/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'deleteServer',
	],
	'admin/rcon/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'rcon',
	],
];