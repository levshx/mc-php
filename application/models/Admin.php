<?php


namespace application\models;
if(!defined("MCPROJECT")){ exit("Hacking Attempt!"); }
use application\core\Model;
use application\lib\Rcon;

class Admin extends Model
{

	public $error;

	public function loginValidate($post)
	{
		$config = require 'application/config/admin.php';
		if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
			$this->error = 'Логин или пароль указан неверно';
			return false;
		}
		return true;
	}

	public function postValidate($post, $type)
	{
		$nameLen = iconv_strlen($post['name']);
		$descriptionLen = iconv_strlen($post['description']);
		$textLen = iconv_strlen($post['text']);
		if ($nameLen < 3 or $nameLen > 100) {
			$this->error = 'Название должно содержать от 3 до 100 символов';
			return false;
		} elseif ($descriptionLen < 3 or $descriptionLen > 100) {
			$this->error = 'Описание должно содержать от 3 до 100 символов';
			return false;
		} elseif ($textLen < 10 or $textLen > 5000) {
			$this->error = 'Текст должнен содержать от 10 до 5000 символов';
			return false;
		}
		if (empty($_FILES['img']['tmp_name']) and $type == 'add') {
			$this->error = 'Изображение не выбрано';
			return false;
		}
		return true;
	}

	public function postAdd($post)
	{
		$params = [
			'id' => '0',
			'name' => $post['name'],
			'description' => $post['description'],
			'text' => $post['text'],
		];
		$this->db->query('INSERT INTO posts (id, name, description, text) VALUES (:id, :name, :description, :text)', $params);
		return $this->db->lastInsertId();
	}

	public function postEdit($post, $id)
	{
		$params = [
			'id' => $id,
			'name' => $post['name'],
			'description' => $post['description'],
			'text' => $post['text'],
		];
		$this->db->query('UPDATE posts SET name = :name, description = :description, text = :text WHERE id = :id', $params);
	}

	public function postUploadImage($path, $id)
	{
		move_uploaded_file($path, 'public/materials/posts/' . $id . '.jpg');
	}

	public function serverUploadImage($path, $id)
	{
		move_uploaded_file($path, 'public/materials/servers/' . $id . '.jpg');
	}

	public function isPostExists($id)
	{
		$params = [
			'id' => $id,
		];
		return $this->db->column('SELECT id FROM posts WHERE id = :id', $params);
	}

	public function postDelete($id)
	{
		$params = [
			'id' => $id,
		];
		$this->db->query('DELETE FROM posts WHERE id = :id', $params);
		unlink('public/materials/posts/' . $id . '.jpg');
	}

	public function postData($id)
	{
		$params = [
			'id' => $id,
		];
		return $this->db->row('SELECT * FROM posts WHERE id = :id', $params);
	}

	public function serverValidate($post, $type)
	{
		if (empty($post['name']) or iconv_strlen($post['name']) > 44) {
			$this->error = 'Название должно содержать от 1 до 45 символов';
			return false;
		} elseif (empty($post['version']) or iconv_strlen($post['version']) > 44) {
			$this->error = 'Версия должна содержать от 1 до 45 символов';
			return false;
		} elseif (!($post['pvp'] = "1" or $post['pvp'] = "0")) {
			$this->error = 'Ошибка ПВП';
			return false;
		} elseif (empty($post['vipedate'])) {
			$this->error = 'Ошибка Даты';
			return false;
		} elseif (empty($post['size']) or iconv_strlen($post['size']) > 44) {
			$this->error = 'Размер должен содержать от 1 до 45 символов';
			return false;
		} elseif (empty($post['mods'])) {
			$this->error = 'Ошибка Моды';
			return false;
		} elseif (empty($post['description'])) {
			$this->error = 'Ошибка Описание';
			return false;
		} elseif (empty($post['host']) or iconv_strlen($post['host']) > 44) {
			$this->error = 'IP должен содержать от 1 до 45 символов';
			return false;
		} elseif (empty($post['port']) or iconv_strlen($post['port']) > 44) {
			$this->error = 'Port должен содержать от 1 до 45 символов';
			return false;
		} elseif (empty($post['rcon_port']) or iconv_strlen($post['rcon_port']) > 44) {
			$this->error = 'rcon port должен содержать от 1 до 45 символов';
			return false;
		} elseif (empty($post['rcon_password']) or iconv_strlen($post['rcon_password']) > 44) {
			$this->error = 'Пароль RCON должен содержать от 1 до 45 символов';
			return false;
		} elseif (!($post['visibility'] = "1" or $post['visibility'] = "0")) {
			$this->error = 'Ошибка видимости';
			return false;
		}
		if (empty($_FILES['img']['tmp_name']) and $type == 'add') {
			$this->error = 'Изображение иконки не выбрано';
			return false;
		}
		return true;
	}

	public function serverAdd($post)
	{
		$params = [
			'id' => '0',
			'name' => $post['name'],
			'version' => $post['version'],
			'pvp' => $post['pvp'],
			'vipedate' => $post['vipedate'],
			'size' => $post['size'],
			'mods' => $post['mods'],
			'description' => $post['description'],
			'host' => $post['host'],
			'port' => $post['port'],
			'rcon_port' => $post['rcon_port'],
			'rcon_password' => $post['rcon_password'],
			'visibility' => $post['visibility'],
		];
		$this->db->query('INSERT INTO servers (id, name, version, pvp, vipedate, size, mods, description, host, port, rcon_port, rcon_password, visibility) VALUES (:id, :name, :version, :pvp, :vipedate, :size, :mods, :description, :host, :port, :rcon_port, :rcon_password, :visibility)', $params);
		return $this->db->lastInsertId();
	}

	public function serverEdit($post, $id)
	{
		$params = [
			'id' => $id,
			'name' => $post['name'],
			'version' => $post['version'],
			'pvp' => $post['pvp'],
			'vipedate' => $post['vipedate'],
			'size' => $post['size'],
			'mods' => $post['mods'],
			'description' => $post['description'],
			'host' => $post['host'],
			'port' => $post['port'],
			'rcon_port' => $post['rcon_port'],
			'rcon_password' => $post['rcon_password'],
			'visibility' => $post['visibility'],
		];
		$this->db->query('UPDATE servers SET name = :name, version = :version, pvp = :pvp, vipedate = :vipedate, size = :size, mods = :mods, description = :description, host = :host, port = :port, rcon_port = :rcon_port, rcon_password = :rcon_password, visibility = :visibility WHERE id = :id', $params);
		return $this->db->lastInsertId();
	}

	public function serverDelete($id)
	{
		$params = [
			'id' => $id,
		];
		$this->db->query('DELETE FROM servers WHERE id = :id', $params);
		unlink('public/materials/servers/' . $id . '.jpg');
	}

	public function isServerExists($id)
	{
		$params = [
			'id' => $id,
		];
		return $this->db->column('SELECT id FROM servers WHERE id = :id', $params);
	}

	public function serverData($id)
	{
		$params = [
			'id' => $id,
		];
		return $this->db->row('SELECT * FROM servers WHERE id = :id', $params)[0];
	}

	public function parseMinecraftColors($string)
	{		
		return preg_replace('/§./', '', $string);
	}

	public function sendRCON($id, $cmd)
	{
		$server = $this->serverData($id);
		$rcon = new Rcon($server['host'], $server['rcon_port'], $server['rcon_password'], 3);
		if ($rcon->connect()) {
			$result = $rcon->sendCommand($cmd);
			if (!$result == false) {
				return $this->parseMinecraftColors($result);
			}
			return $result;
		}
	}
}
