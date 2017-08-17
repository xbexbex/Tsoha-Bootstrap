<?php

class AccountController extends BaseController{


	public static function login(){
		View::make('account/account_login.html');
	}

	public static function handle_login(){
		$params = $_POST;
		$account = Account::authenticate($params['name'], $params['password']);

		if(!$account){
			View::make('account/account_login.html', array('error' => 'Wrong username or password', 'name' => $params['name']));
		}else{
			$_SESSION['account'] = $account->id;
			Redirect::to('/', array('message' => 'Welcome back ' . $account->name . '!', 'account_logged_in' => self::get_account_logged_in()));
		}
	}

	public static function logout(){
		$_SESSION['account'] = null;
		Redirect::to('/login', array('message' => 'You have logged out'));
	}
}