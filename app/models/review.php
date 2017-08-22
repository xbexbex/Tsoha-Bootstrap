<?php

class Review extends BaseModel{

	public $id, $heading, $lead, $content, $time_added, $time_modified, $score, $image, $account_id;

	public function __construct($attributes){
		parent::__construct($attributes);
		$this->account_id = 1;
	}

	public static function all($l=0){

		if ($l == 0) {
			$query = DB::connection()->prepare('SELECT * FROM Review');
			$query->execute();
		} else {
			$query = DB::connection()->prepare('SELECT * FROM Review ORDER BY time_added DESC LIMIT :l');
			$query->execute(array('l' => $l));
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
		$query = DB::connection()->prepare('UPDATE Review SET heading = :heading, lead = :lead, content = :content, time_modified = :time_modified, score = :score WHERE id = :id');
		$query->execute(array('heading' => $this->heading, 'lead' => $this->lead, 'content' => $this->content, 'time_modified' => $this->time_modified, 'score' => $this->score, 'id' => $this->id));
	}

	public function remove(){
		$query = DB::connection()->prepare('DELETE FROM Review WHERE id = :id');
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

	private function imagify(){
		$img = $this->image;
		if($img == null || strlen($img) < 5){
			$this->image = "null";
		}
	} 
}