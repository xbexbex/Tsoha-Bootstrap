<?php

class Review extends BaseModel{

	public $id, $heading, $lead, $content, $time_added, $score, $account_id;

	public function __construct($attributes){
		parent::__construct($attributes);
		$this->account_id = 1;
		$this->time_added = parent::get_time();
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
				'score' => $row['score'],
				'account_id' => $row['account_id']
				));

			return $review;
		}

		return null;
	}

	public function save(){
		$query = DB::connection()->prepare('INSERT INTO Review (heading, lead, content, time_added, score, account_id) VALUES (:heading, :lead, :content, :time_added, :score, :account_id) RETURNING id');
		$query->execute(array('heading' => $this->heading, 'lead' => $this->lead, 'content' => $this->content, 'time_added' => $this->time_added, 'score' => $this->score, 'account_id' => $this->account_id));
		$row = $query->fetch();
		$this->id = $row['id'];
	}

	public function modify(){
		$query = DB::connection()->prepare('UPDATE Review SET heading = :heading, lead = :lead, content = :content, score = :score WHERE id = :id');
		$query->execute(array('heading' => $this->heading, 'lead' => $this->lead, 'content' => $this->content, 'score' => $this->score, 'id' => $this->id));
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
}