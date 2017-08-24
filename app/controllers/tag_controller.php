<?php

class TagController extends BaseController{

	public static function all(){
		$tags = Tags::all(10);
		View::make('index.html', array('tags' => $tags, 'account_logged_in' => self::get_account_logged_in()));
	}

	public static function show($name){
		$tag = tag::find($name);
		$reviews = Tag::tags_for_tag($id);
		View::make('tag/tag.html', array('tag' => $tag, 'tags' => $tags, 'account_logged_in' => self::get_account_logged_in(), 'edit_rights' => self::check_edit_rights($id)));
	}

	public static function edit($id){
		self::check_logged_in();
		$tag = tag::find($id);
		$tags = Tag::tags_for_tag($id);
		View::make('tag/tag_modify.html', array('attributes' => $tag, 'tags' => $tags, 'account_logged_in' => self::get_account_logged_in(), 'edit_rights' => self::check_edit_rights($id)));
	}

	public static function add(){
		self::check_logged_in();
		View::make('tag/tag_add.html', array('account_logged_in' => self::get_account_logged_in()));
	}

	public static function store(){
		$params = $_POST;
		$attributes = array(
			'heading' => $params['heading'],
			'lead' => $params['lead'],
			'content' => $params['content'],
			'score' => $params['score'],
			'image' => $params['image'],
			'user_id' => 1
			);
		$tag = new tag($attributes);
		$errors = $tag->errors();
		if(count($errors) == 0){
			$tag->save();
			Tag::add_tags_to_tag($params['tags']);

			Redirect::to('/tag/' . $tag->id, array('message' => 'Your tag has been published!', 'account_logged_in' => self::get_account_logged_in()));
		}else{
			View::make('tag/tag_add.html', array('errors' => $errors, 'attributes' => $attributes, 'account_logged_in' => self::get_account_logged_in()));
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
		$tag = new tag($attributes);
		$errors = $tag->errors();

		if(count($errors) > 0){
			View::make('tag/tag_modify.html', array('errors' => $errors, 'attributes' => $attributes, 'account_logged_in' => self::get_account_logged_in()));
		}else{
			$tag->modify();
			Redirect::to('/tag/' . $tag->id, array('message' => 'tag succesfully edited', 'account_logged_in' => self::get_account_logged_in()));
		}
	}

	public static function remove($id){
		self::check_logged_in();
		$tag = new tag(array('id' => $id));
		$tag->remove();
		Redirect::to('/', array('message' => 'tag deleted!', 'account_logged_in' => self::get_account_logged_in()));
	}
}
