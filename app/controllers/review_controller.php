<?php

class ReviewController extends BaseController{

	public static function index(){
		$reviews = Review::all(10);
		View::make('index.html', array('reviews' => $reviews, 'account_logged_in' => self::get_account_logged_in()));
	}

	public static function show($id){
		$review = Review::find($id);
		View::make('review/review.html', array('review' => $review, 'account_logged_in' => self::get_account_logged_in()));
	}

	public static function edit($id){
		self::check_logged_in();
		$review = Review::find($id);
		View::make('review/review_modify.html', array('attributes' => $review, 'account_logged_in' => self::get_account_logged_in(), $edit_rights = self::check_edit_rights()));
	}

	public static function add(){
		self::check_logged_in();
		View::make('review/review_add.html', array('account_logged_in' => self::get_account_logged_in()));
	}

	public static function store(){
		$params = $_POST;
		$attributes = array(
			'heading' => $params['heading'],
			'lead' => $params['lead'],
			'content' => $params['content'],
			'score' => $params['score'],
			'user_id' => 1
			);
		$review = new Review($attributes);
		$errors = $review->errors();
		if(count($errors) == 0){
			$review->save();
			Redirect::to('/review/' . $review->id, array('message' => 'Your review has been published!', 'account_logged_in' => self::get_account_logged_in()));
		}else{
			View::make('review/review_add.html', array('errors' => $errors, 'attributes' => $attributes, 'account_logged_in' => self::get_account_logged_in()));
		}
		
	}

	public static function modify($id){
		self::check_logged_in();
		$params = $_POST;
		$attributes = array(
			'id' => $id,
			'heading' => $params['heading'],
			'lead' => $params['lead'],
			'content' => $params['content'],
			'score' => $params['score'],
			'user_id' => 1
			);
		$review = new Review($attributes);
		$errors = $review->errors();

		if(count($errors) > 0){
			View::make('review/review_modify.html', array('errors' => $errors, 'attributes' => $attributes, 'account_logged_in' => self::get_account_logged_in()));
		}else{
			$review->modify();
			Redirect::to('/review/' . $review->id, array('message' => 'Review succesfully edited', 'account_logged_in' => self::get_account_logged_in()));
		}
	}

	public static function remove($id){
		self::check_logged_in();
		$review = new Review(array('id' => $id));
		$review->remove();
		Redirect::to('/', array('message' => 'Review deleted!', 'account_logged_in' => self::get_account_logged_in()));
	}
}
