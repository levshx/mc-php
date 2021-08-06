<?php

namespace application\models;
if(!defined("MCPROJECT")){ exit("Hacking Attempt!"); }
use application\core\Model;

class Main extends Model {

	public $error;

	public function contactValidate($post) {
		$nameLen = iconv_strlen($post['name']);
		$textLen = iconv_strlen($post['text']);
		if ($nameLen < 3 or $nameLen > 20) {
			$this->error = 'Имя должно содержать от 3 до 20 символов';
			return false;
		} elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
			$this->error = 'E-mail указан неверно';
			return false;
		} elseif ($textLen < 10 or $textLen > 500) {
			$this->error = 'Сообщение должно содержать от 10 до 500 символов';
			return false;
		}
		return true;
	}

	public function postsCount() {
		return $this->db->column('SELECT COUNT(id) FROM posts');
	}

	public function postsList($route) {
		$max = 10;
		$params = [
			'max' => $max,
			'start' => ((($route['page'] ?? 1) - 1) * $max),
		];
		return $this->db->row('SELECT * FROM posts ORDER BY id DESC LIMIT :start, :max', $params);
	}



	public function serversList() {
		return  $this->db->row('SELECT * FROM servers');	
	}

	public function getServersInfo() {
		$list = $this->serversList();	
		$result = [];
		foreach ($list as $item) {
			if (!empty($item['visibility'])) {				
				unset($item['rcon_port']);
				unset($item['rcon_password']);
				unset($item['visibility']);
				array_push($result, $item);
			}			
		}
		return $result;
	}

}