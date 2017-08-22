<?php

class TestController extends BaseController{

	public static function test(){
		$reviews = Review::all(10);
		View::make('index.html', array('reviews' => $reviews, 'account_logged_in' => self::get_account_logged_in()));
	}
}