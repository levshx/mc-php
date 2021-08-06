<?php

namespace application\controllers;
if(!defined("MCPROJECT")){ exit("Hacking Attempt!"); }
use application\core\Controller;
use application\lib\Pagination;


class MainController extends Controller {

	public function indexAction() {
		$pagination = new Pagination($this->route, $this->model->postsCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' => $this->model->postsList($this->route),
		];
		$this->view->render('Главная страница', $vars);
	}

	public function serversAction() {
		$vars = [			
			'list' => $this->model->getServersInfo(),
		];
		$this->view->render('Сервера', $vars);
	}

	public function rulesAction() {
		$this->view->render('Правила');
	}

}