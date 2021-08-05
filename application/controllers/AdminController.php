<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;
use application\models\Main;

class AdminController extends Controller {

	public function __construct($route) {
		parent::__construct($route);
		$this->view->layout = 'admin';
	}

	/**
     * Обработка входа в Админ Панель.
     */
	public function loginAction() {
		if (isset($_SESSION['admin'])) {
			$this->view->redirect('admin/add');
		}
		if (!empty($_POST)) {
			if (!$this->model->loginValidate($_POST)) {
				$this->view->message('error', $this->model->error);
			}
			$_SESSION['admin'] = true;
			$this->view->location('admin/add');
		}
		$this->view->render('Вход');
	}

	/**
     * Обработка запроса выхода из админ панели.
     */
	public function logoutAction() {
		unset($_SESSION['admin']);
		$this->view->redirect('admin/login');
	}

	/**
     * Обработка запроса добавления поста.
     */
	public function addPostAction() {
		if (!empty($_POST)) {
			if (!$this->model->postValidate($_POST, 'add')) {
				$this->view->message('error', $this->model->error);
			}
			
			$id = $this->model->postAdd($_POST);
			
			if (!$id) {
				$this->view->message('error', 'Ошибка обработки запроса');
			}			
			$this->model->postUploadImage($_FILES['img']['tmp_name'], $id);
			$this->view->message('success', 'Пост добавлен');
		}
		$this->view->render('Добавить пост');
	}

	/**
     * Обработка запроса редактирования поста.
     */
	public function editPostAction() {
		if (!$this->model->isPostExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		if (!empty($_POST)) {
			if (!$this->model->postValidate($_POST, 'edit')) {
				$this->view->message('error', $this->model->error);
			}
			$this->model->postEdit($_POST, $this->route['id']);
			if ($_FILES['img']['tmp_name']) {
				$this->model->postUploadImage($_FILES['img']['tmp_name'], $this->route['id']);
			}
			$this->view->message('success', 'Сохранено');
		}
		$vars = [
			'data' => $this->model->postData($this->route['id'])[0],
		];
		$this->view->render('Редактировать пост', $vars);
	}

	/**
     * Обработка запроса удаления поста.
     */
	public function deletePostAction() {
		if (!$this->model->isPostExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		$this->model->postDelete($this->route['id']);
		$this->view->redirect('admin/posts');
	}

	/**
     * Обработка запроса вывода постов.
     */
	public function postsAction() {
		$mainModel = new Main;
		$pagination = new Pagination($this->route, $mainModel->postsCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $mainModel->postsList($this->route),
		];
		$this->view->render('Посты', $vars);
	}

	/**
     * Обработка запроса вывода серверов.
     */
	public function serversAction() {
		$vars = [			
			'list' => $this->model->getServers()
		];
		$this->view->render('Сервера', $vars);
	}

	/**
     * Обработка запроса вывода серверов.
     */
	public function addServerAction() {
		if (!empty($_POST)) {
			if (!$this->model->postValidate($_POST, 'add')) {
				$this->view->message('error', $this->model->error);
			}
			
			$id = $this->model->postAdd($_POST);
			
			if (!$id) {
				$this->view->message('error', 'Ошибка обработки запроса');
			}			
			$this->model->postUploadImage($_FILES['img']['tmp_name'], $id);
			$this->view->message('success', 'Пост добавлен');
		}
		$this->view->render('Добавить сервер');
	}

}