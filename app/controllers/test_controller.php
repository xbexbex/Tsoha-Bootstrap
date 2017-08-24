<?php

class TestController extends BaseController{

	public static function test(){
		$review = Review::find(1);
		View::make('test.html', array('review' => $review, 'account_logged_in' => self::get_account_logged_in()));
	}
}