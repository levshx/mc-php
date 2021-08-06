<?php
if(!defined("MCPROJECT")){ exit("Hacking Attempt!"); }
return [
	'all' => [
		'login',
	],
	'authorize' => [
		//
	],
	'guest' => [
		//
	],
	'admin' => [
		'index',
		'posts',
		'logout',
		'addPost',
		'editPost',
		'deletePost',
		'users',
		'editUser',	
		'servers',	
		'addServer',
		'editServer',
		'deleteServer',	
		'rcon',					
	],
];