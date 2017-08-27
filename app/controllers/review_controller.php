<?php

class ReviewController extends BaseController{

	public static function index(){
		$params = $_GET;
		if(isset($params['search'])){
			$word = $params['search'];
			$reviews = Review::search($word);
			$heading = 'Search: ' . $word;
		} else {
			$reviews = Review::all();
			$heading = 'Newest reviews';
		}
		View::make('index.html', array('reviews' => $reviews, 'heading' => $heading, 'account_logged_in' => self::get_account_logged_in()));
	}

	public static function reviews_for_user($id){
		if(parent::check_edit_rights($id) < 1){
			Redirect::to('/', array('messagebad' => 'You do not have the sufficient rights'));
		}
		$account = Account::find($id);
		$reviews = Review::reviews_for_user($id);
		$heading = 'Reviews for user: ' . $account->name;
		View::make('index.html', array('reviews' => $reviews, 'heading' => $heading, 'account_logged_in' => self::get_account_logged_in()));
	}

	public static function show($id){
		$review = Review::find($id);
		$account = parent::get_account_logged_in();
		$edit_rights = parent::check_edit_rights($review->account_id);
		$tag_array = Tag::tags_for_review($id);
		View::make('review/review.html', array('review' => $review, 'tag_array' => $tag_array, 'account_logged_in' => $account, 'edit_rights' => $edit_rights));
	}

	public static function edit($id){
		parent::check_logged_in();
		$review = Review::find($id);
		$account = parent::get_account_logged_in();
		$edit_rights = parent::check_edit_rights($review->account_id);
		$tags = Tag::tags_for_review_string($id);
		View::make('review/review_modify.html', array('attributes' => $review, 'tags' => $tags, 'account_logged_in' => $account, 'edit_rights' => $edit_rights));
	}

	public static function add(){
		parent::check_logged_in();
		View::make('review/review_add.html', array('account_logged_in' => self::get_account_logged_in()));
	}

	public static function store(){
		$params = $_POST;
		$account = parent::get_account_logged_in();
		$attributes = array(
			'heading' => $params['heading'],
			'lead' => $params['lead'],
			'content' => $params['content'],
			'score' => $params['score'],
			'image' => $params['image'],
			'account_id' => $account->id
			);
		$review = new Review($attributes);
		$errors = $review->errors();
		if(count($errors) == 0){
			$review->save();
			Tag::add_tags_to_review($params['tags'], $review->id);
			Redirect::to('/review/' . $review->id, array('message' => 'Your review has been published!', 'account_logged_in' => $account));
		}else{
			View::make('review/review_add.html', array('errors' => $errors, 'attributes' => $attributes, 'tags' => $params['tags'], 'account_logged_in' => $account));
		}
		
	}

	public static function modify($id){
		self::check_logged_in();
		$params = $_POST;
		$review = Review::find($id);
		$attributes = array(
			'id' => $id,
			'heading' => $params['heading'],
			'lead' => $params['lead'],
			'content' => $params['content'],
			'image' => $params['image'],
			'score' => $params['score'],
			'account_id' => $review->account_id
			);
		$review = new Review($attributes);
		$errors = $review->errors();

		if(count($errors) > 0){
			View::make('review/review_modify.html', array('errors' => $errors, 'attributes' => $attributes, 'tags' => $params['tags'], 'account_logged_in' => self::get_account_logged_in()));
		}else{
			$review->modify();
			Tag::remove_review_tags($id);
			Tag::add_tags_to_review($params['tags'], $id);
			Redirect::to('/review/' . $review->id, array('message' => 'Review succesfully edited', 'account_logged_in' => self::get_account_logged_in()));
		}
	}

	public static function remove($id){
		self::check_logged_in();
		$review = new Review(array('id' => $id));
		Tag::remove_review_tags($review->id);
		$review->remove();
		Redirect::to('/', array('message' => 'Review deleted!', 'account_logged_in' => self::get_account_logged_in()));
	}
}
