<?php

namespace application\controllers;
if(!defined("MCPROJECT")){ exit("Hacking Attempt!"); }
use application\core\Controller;

class UserController extends Controller {

	public function profileAction() {
		$vars = [
			'user' => $this->model->getUserById($_SESSION['authorize']['id']),
			'skinUrl' => $this->model->skinUrl($_SESSION['authorize']['id']),
			'cloakUrl' => $this->model->cloakUrl($_SESSION['authorize']['id']),
		];
		$this->view->render('Профиль', $vars);
	}

	public function regAction() {
		if (!empty($_POST)) {			
			if (!$this->model->regValidate($_POST)) {
				$this->view->message('error', $this->model->error);
			}
			$userId = $this->model->createUser($_POST);
			$_SESSION['authorize']['id'] = $userId;
			$this->view->location('profile');
		}
		$this->view->render('Регистрация');
	}


	public function loginAction() {
		if (!empty($_POST)) {
			if (!$this->model->loginValidate($_POST)) {
				$this->view->message('error', $this->model->error);
			}
			$user = $this->model->getUserInAuth($_POST);
			$_SESSION['authorize']['id'] = $user['id'];
			if ($user['perm'] == 1) {
				$_SESSION['admin'] = true;
			}
			$this->view->reload();
		}		
	}

	public function logoutAction() {		
		unset($_SESSION['authorize']['id']);
		unset($_SESSION['admin']);
		$this->view->location('main/index/1');
	}

	public function skinUploadAction() {
		if ($_FILES['skin']['tmp_name'])
		{
			$tmp_name = $_FILES['skin']['tmp_name'];
			$user_id = $_SESSION['authorize']['id'];			
			$size = $_FILES['skin']['size'];

			if ($this->model->skinUploadImage($tmp_name, $size, $user_id))	
			{
				$this->view->message('error', "Скин загружен (Чтобы увидеть в браузере сделайте жёсткую перезагрузку Ctrl+F5)");
			}	
			else
			{
				$this->view->message('error', $this->model->error);
			}
		}
		else
		{
			$this->view->message('error', "Файл не загружен");	
		}
	}

	public function cloakUploadAction() {
		if ($_FILES['cloak']['tmp_name'])
		{
			$tmp_name = $_FILES['cloak']['tmp_name'];
			$user_id = $_SESSION['authorize']['id'];			
			$size = $_FILES['cloak']['size'];

			if ($this->model->cloakUploadImage($tmp_name, $size, $user_id))	
			{
				$this->view->message('error', "Плащ загружен (Чтобы увидеть изменения в браузере сделайте жёсткую перезагрузку Ctrl+F5)");
			}	
			else
			{
				$this->view->message('error', $this->model->error);
			}
		}
		else
		{
			$this->view->message('error', "Файл не загружен");	
		}
	}

}