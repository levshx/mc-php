<?php

namespace application\controllers;

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
			$this->view->reload();
		}		
	}

	public function logoutAction() {		
		unset($_SESSION['authorize']['id']);
		$this->view->location('main/index/1');
	}

}