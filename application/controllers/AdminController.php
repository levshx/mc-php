<?php

namespace application\controllers;
if(!defined("MCPROJECT")){ exit("Hacking Attempt!"); }
use application\core\Controller;
use application\lib\Pagination;
use application\models\Main;

class AdminController extends Controller
{

	public function __construct($route)
	{
		parent::__construct($route);
		$this->view->layout = 'admin';
	}


	/**
	 * Обработка запроса выхода из админ панели.
	 */
	public function logoutAction()
	{
		unset($_SESSION['admin']);
		unset($_SESSION['authorize']['id']);
		$this->view->redirect('main/index/1');
	}

	public function indexAction()
	{
		$this->view->render('Панель Администратора');
	}

	/**
	 * Обработка запроса добавления поста.
	 */
	public function addPostAction()
	{
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
	public function editPostAction()
	{
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
	public function deletePostAction()
	{
		if (!$this->model->isPostExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		$this->model->postDelete($this->route['id']);
		$this->view->redirect('admin/posts');
	}

	/**
	 * Обработка запроса вывода постов. Используется модель Main.
	 */
	public function postsAction()
	{
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
	public function serversAction()
	{
		$mainModel = new Main;
		$vars = [
			'list' => $mainModel->serversList()
		];
		$this->view->render('Сервера', $vars);
	}

	/**
	 * Обработка запроса вывода серверов.
	 */
	public function addServerAction()
	{
		if (!empty($_POST)) {
			if (!$this->model->serverValidate($_POST, 'add')) {
				$this->view->message('error', $this->model->error);
			}
			$id = $this->model->serverAdd($_POST);
			if (!$id) {
				$this->view->message('error', 'Ошибка обработки запроса (Мейба добавилось чекни)');
			}
			$this->model->ServerUploadImage($_FILES['img']['tmp_name'], $id);
			$this->view->message('success', 'Сервер добавлен');
		}
		$this->view->render('Добавить сервер');
	}

	/**
	 * Обработка запроса удаления сервера.
	 */
	public function deleteServerAction()
	{
		if (!$this->model->isServerExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		$this->model->serverDelete($this->route['id']);
		$this->view->redirect('admin/servers');
	}

	/**
	 * Обработка запроса редактирования сервера.
	 */
	public function editServerAction()
	{
		if (!$this->model->isServerExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		if (!empty($_POST)) {
			if (!$this->model->serverValidate($_POST, 'edit')) {
				$this->view->message('error', $this->model->error);
			}
			$this->model->serverEdit($_POST, $this->route['id']);
			if ($_FILES['img']['tmp_name']) {
				$this->model->serverUploadImage($_FILES['img']['tmp_name'], $this->route['id']);
			}
			$this->view->message('success', 'Сохранено');
		}
		$vars = [
			'data' => $this->model->serverData($this->route['id']),
		];
		$this->view->render('Редактировать пост', $vars);
	}

	/**
	 * RCON
	 */
	public function rconAction()
	{
		if (!isset($_POST['cmd'])) {
			$data = $this->model->serverData($this->route['id']);
			$id = $this->route['id'];
			require_once('rcon/index.php');
			exit();
		} else {
			$response['status'] = 'success';
			$response['command'] = $_POST['cmd'];
			$response['response'] = $this->model->sendRCON($this->route['id'], $_POST['cmd']);
			header('Content-Type: application/json');
			exit(json_encode($response, JSON_UNESCAPED_UNICODE));
		}
	}
}
