<?php

namespace application\core;
if(!defined("MCPROJECT")){ exit("Hacking Attempt!"); }
use application\lib\Db;

abstract class Model {

	public $db;
	
	public function __construct() {
		$this->db = new Db;
	}

}