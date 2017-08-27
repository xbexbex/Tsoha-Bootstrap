<?php

class Review extends BaseModel{

	public $id, $heading, $lead, $content, $time_added, $time_modified, $score, $image, $account_id;

	public function __construct($attributes){
		parent::__construct($attributes);
	}

	public static function all($first=0, $last=0){
		if (($last == 0) OR (0 > $first )) {
			$query = DB::connection()->prepare('SELECT * FROM Review ORDER BY time_added DESC');
			$query->execute();
		} else {
			$query = DB::connection()->prepare('SELECT * FROM Review LIMIT :first,:last ORDER BY time_added DESC');
			$query->execute(array('first' => $first, 'last' => $last));
		}
		$rows = $query->fetchAll();
		$reviews = array();

		foreach($rows as $row){
			$reviews[] = new Review(array(
				'id' => $row['id'],
				'heading' => $row['heading'],
				'lead' => $row['lead'],
				'content' => $row['content'],
				'time_added' => $row['time_added'],
				'time_modified' => $row['time_modified'],
				'score' => $row['score'],
				'image' => $row['image'],
				'account_id' => $row['account_id']
				));
		}

		return $reviews;
	}

	public static function reviews_for_user($id){
		$query = DB::connection()->prepare('SELECT * FROM Review WHERE account_id = :user_id ORDER BY time_added DESC');
		$query->execute(array('user_id' => $id));
		$rows = $query->fetchAll();
		$reviews = array();

		foreach($rows as $row){
			$reviews[] = new Review(array(
				'id' => $row['id'],
				'heading' => $row['heading'],
				'lead' => $row['lead'],
				'content' => $row['content'],
				'time_added' => $row['time_added'],
				'time_modified' => $row['time_modified'],
				'score' => $row['score'],
				'image' => $row['image'],
				'account_id' => $row['account_id']
				));
		}
		return $reviews;
	}

	public static function search($word){
		$query = DB::connection()->prepare('SELECT * FROM Review WHERE UPPER(heading) LIKE :word OR UPPER(lead) LIKE :word OR UPPER(content) LIKE :word');
		$word = strtoupper('%' . $word . '%');
		$query->execute(array('word' => $word));

		$rows = $query->fetchAll();
		$reviews = array();

		foreach($rows as $row){
			$reviews[] = new Review($row);
		}

		return $reviews;
	}

	public static function find($id){
		$query = DB::connection()->prepare('SELECT * FROM Review WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();

		if($row){
			$review = new Review(array(
				'id' => $row['id'],
				'heading' => $row['heading'],
				'lead' => $row['lead'],
				'content' => $row['content'],
				'time_added' => $row['time_added'],
				'time_modified' => $row['time_modified'],
				'score' => $row['score'],
				'image' => $row['image'],
				'account_id' => $row['account_id']
				));

			return $review;
		}

		return null;
	}

	public function save(){
		$this->time_added = parent::get_time();
		self::imagify();
		$query = DB::connection()->prepare('INSERT INTO Review (heading, lead, content, time_added, time_modified, score, image, account_id) VALUES (:heading, :lead, :content, :time_added, :time_modified, :score, :image, :account_id) RETURNING id');
		$query->execute(array('heading' => $this->heading, 'lead' => $this->lead, 'content' => $this->content, 'time_added' => $this->time_added, 'time_modified' => $this->time_added, 'score' => $this->score, 'image' => $this->image, 'account_id' => $this->account_id));
		$row = $query->fetch();
		$this->id = $row['id'];
	}

	public function modify(){
		$this->time_modified = parent::get_time();
		$query = DB::connection()->prepare('UPDATE Review SET heading = :heading, lead = :lead, content = :content, time_modified = :time_modified, score = :score, image = :image WHERE id = :id');
		$query->execute(array('heading' => $this->heading, 'lead' => $this->lead, 'content' => $this->content, 'time_modified' => $this->time_modified, 'score' => $this->score, 'image' => $this->image, 'id' => $this->id));
	}

	public function remove(){
		$query = DB::connection()->prepare('DELETE FROM Review WHERE id = :id');
		$query->execute(array('id' => $this->id));

		$query = DB::connection()->prepare('DELETE FROM Reviewtag WHERE review_id = :id');
		$query->execute(array('id' => $this->id));
	}

	public static function reviews_for_tag($tag){
		$word = '%' . $tag->name . '%';
		$query = DB::connection()->prepare('
			SELECT * FROM Review
			INNER JOIN Reviewtag ON review_id = id
			WHERE tag_name LIKE :word
			');
		$query->execute(array('word' => $word));
		$rows = $query->fetchAll();

		$reviews = array();
		foreach($rows as $row){
			$reviews[] = new Review($row);
		}
		return $reviews;
	} 

	private function imagify(){
		$img = $this->image;
		if($img == null || strlen($img) < 5){
			$this->image = "null";
		}
	}

	public function errors(){
		$errors = array(
			parent::validate_string_length("Heading", $this->heading, 1, 50),
			parent::validate_string_length("Sub-heading", $this->lead, 1, 400),
			parent::validate_string_length("Content", $this->content, 1, 2000),
			parent::validate_int("Score", $this->score),
			parent::validate_int_range("Score", $this->score, 0, 5)
			);
		$errors = array_filter($errors);
		return $errors;
	} 
}