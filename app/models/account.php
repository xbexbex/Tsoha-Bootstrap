<?php

class Account extends BaseModel{

	public $id, $name, $password, $admin;

	public function __construct($attributes){
		parent::__construct($attributes);
	}

	public static function all(){

		$query = DB::connection()->prepare('SELECT * FROM Account');
		$query->execute();
		$rows = $query->fetchAll();
		$arvostelut = array();

		foreach($rows as $row){
			$accounts[] = new Account(array(
				'id' => $row['id'],
				'name' => $row['name'],
				'password' => $row['password'],
				'admin' => $row['admin']
				));
		}

		return $accounts;
	}

	public static function find($id){
		$query = DB::connection()->prepare('SELECT * FROM Account WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();

		if($row){
			$account = new Account(array(
				'id' => $row['id'],
				'name' => $row['name'],
				'password' => $row['password'],
				'admin' => $row['admin']
				));

			return $account;
		}

		return null;
	}

	public static function authenticate($name, $password){
		$query = DB::connection()->prepare('SELECT * FROM Account WHERE name = :name AND password = :password LIMIT 1');
		$query->execute(array('name' => $name, 'password' => $password));
		$row = $query->fetch();

		if($row){
			$account = new Account(array(
				'id' => $row['id'],
				'name' => $row['name'],
				'password' => $row['password'],
				'admin' => $row['admin']
				));
			return $account;
		}else{
			return null;
		}
	}
}