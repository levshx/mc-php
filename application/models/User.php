<?php

namespace application\models;

if (!defined("MCPROJECT")) {
	exit("Hacking Attempt!");
}

use application\core\Model;

class User extends Model
{

	public $error;

	public function loginValidate($post)
	{
		$params = [
			'login' => $post['login'],
			'password' => md5($post['password']),
		];
		$user = $this->db->row('SELECT * FROM users WHERE ( (login = :login OR email = :login) AND password = :password)', $params);
		if (count($user) > 0) {
			return true;
		} else {
			$this->error = 'Не правильный логин/email либо пароль';
			return false;
		}
	}

	public function getUserInAuth($post)
	{
		$params = [
			'login' => $post['login'],
			'password' => md5($post['password']),
		];
		return  $this->db->row('SELECT * FROM users WHERE ( (login = :login OR email = :login) AND password = :password)', $params)[0];
	}

	public function skinUrl($id)
	{
		$login = $this->getUserById($id)['login'];
		if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/public/users/skins/' . $login . '.png')) {
			return '/public/users/skins/' . $login . '.png';
		} else
			return '/public/users/default/skin.png';
	}

	public function cloakUrl($id)
	{
		$login = $this->getUserById($id)['login'];
		if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/public/users/cloaks/' . $login . '.png')) {
			return '/public/users/cloaks/' . $login . '.png';
		} else
			return '/public/users/default/cloak.png';
	}



	public function getUserById($id)
	{
		$params = [
			'id' => $id,
		];
		return  $this->db->row('SELECT * FROM users WHERE id = :id', $params)[0];
	}

	public function createUser($post)
	{
		$params = [
			'id' => 0,
			'login' => $post['login'],
			'password' => md5($post['password']),
			'email' => $post['email'],
		];
		$this->db->row('INSERT INTO users (id, login, password, email) VALUES (:id, :login, :password, :email);', $params);
		return $this->db->lastInsertId();
	}

	public function regValidate($post)
	{
		$nameLen = iconv_strlen($post['login']);
		$passLen = iconv_strlen($post['password']);
		if ($nameLen < 3 or $nameLen > 20) {
			$this->error = 'Имя должно содержать от 3 до 20 символов';
			return false;
		} elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
			$this->error = 'E-mail указан неверно';
			return false;
		} elseif ($passLen < 8 or $passLen > 45) {
			$this->error = 'Пароль должен содержать от 8 до 45 символов';
			return false;
		} elseif ($post['password'] != $post['password2']) {
			$this->error = 'Пароли не совпадают';
			return false;
		} else {
			$params1 = [
				'login' => $post['login'],
			];
			$DB_login = $this->db->row('SELECT * FROM users WHERE login = :login', $params1);
			if (count($DB_login) > 0) {
				$this->error = 'Пользователь с таким логином уже существует';
				return false;
			}
			$params2 = [
				'email' => $post['email'],
			];
			$DB_email = $this->db->row('SELECT * FROM users WHERE email = :email', $params2);
			if (count($DB_email) > 0) {
				$this->error = 'Пользователь с таким Email уже существует';
				return false;
			}
		}
		return true;
	}

	public function skinUploadImage($path, $size, $id)
	{
		$allowed_types = array('image/png');
		$fileInfo = finfo_open(FILEINFO_MIME_TYPE);
		$detected_type = finfo_file($fileInfo, $path);
		if (!in_array($detected_type, $allowed_types)) {
			finfo_close($fileInfo);
			$this->error = 'Файл имеет плохой формат (ошибка кодировки)';
			return false;
		}

		if ($size > 1048576) {
			$this->error = 'Файл превышает максимальный размер 1 МБ';
			return false;
		}

		finfo_close($fileInfo);
		
		if (move_uploaded_file($path, 'public/users/skins/' . $this->getUserById($id)["login"] . '.png')) {
			return true;
		}		
	}

	public function cloakUploadImage($path, $size, $id)
	{
		$allowed_types = array('image/png');
		$fileInfo = finfo_open(FILEINFO_MIME_TYPE);
		$detected_type = finfo_file($fileInfo, $path);
		if (!in_array($detected_type, $allowed_types)) {
			finfo_close($fileInfo);
			$this->error = 'Файл имеет плохой формат (ошибка кодировки)';
			return false;
		}

		if ($size > 524288) {
			$this->error = 'Файл превышает максимальный размер 0,5 МБ';
			return false;
		}

		finfo_close($fileInfo);
		
		if (move_uploaded_file($path, 'public/users/cloaks/' . $this->getUserById($id)["login"] . '.png')) {
			return true;
		}		
	}
}
