<?php

class Review extends BaseModel{

	public $id, $heading, $lead, $content, $time_added, $time_modified, $score, $image, $account_id;

	public function __construct($attributes){
		parent::__construct($attributes);
		$this->account_id = 1;
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
		$query = DB::connection()->prepare('INSERT INTO Review (heading, lead, content, time_added, score, image, account_id) VALUES (:heading, :lead, :content, :time_added, :score, :image, :account_id) RETURNING id');
		$query->execute(array('heading' => $this->heading, 'lead' => $this->lead, 'content' => $this->content, 'time_added' => $this->time_added, 'score' => $this->score, 'image' => $this->image, 'account_id' => $this->account_id));
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

	public function errors(){
		$this->validatees = array(
			'Heading' => $this->heading, 
			'Sub-heading' => $this->lead, 
			'Content' => $this->content);
		$this->validators = array('validate_string_empty');
		$errors = parent::validate_many($this->validatees, $this->validators);

		$this->validatees = array(
			'Score' => $this->score,
			'Account ID' => $this->account_id);
		$this->validators = array('validate_int');
		$errors = array_merge($errors, parent::validate_many($this->validatees, $this->validators));
		return $errors;
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
}