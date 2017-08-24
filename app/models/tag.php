<?php

class Tag extends BaseModel{

	public $name, $url_id;

	public function __construct($attributes){
		parent::__construct($attributes);
	}

	public static function all(){

		$query = DB::connection()->prepare('SELECT * FROM Tag');
		$query->execute();
		$rows = $query->fetchAll();
		$tags= array();

		foreach($rows as $row){
			$tags[] = new Tag(array(
				'name' => $row['name'],
				'url_id' => $row['url_id']
				));
		}

		return $tags;
	}

	public static function find($name){
		$query = DB::connection()->prepare('SELECT * FROM Tag WHERE name = :name LIMIT 1');
		$query->execute(array('name' => $name));
		$row = $query->fetch();

		if($row){
			$tag = new Tag(array(
				'name' => $row['name'],
				'url_id' => $row['url_id']
				));

			return $tag;
		}
		return null;
	}

	public static function find_by_id($id){
		$query = DB::connection()->prepare('SELECT * FROM Tag WHERE url_id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();

		if($row){
			$tag = new Tag(array(
				'name' => $row['name'],
				'url_id' => $row['url_id']
				));

			return $tag;
		}

		return null;
	}

	public static function if_exists($name){
		$query = DB::connection()->prepare('SELECT * FROM Tag WHERE name = :name LIMIT 1');
		$query->execute(array('name' => $name));
		$row = $query->fetch();

		if($row){
			return true;
		}
		return false;
	}

	public static function reviewtag_if_exists($name, $id){
		$query = DB::connection()->prepare('
			SELECT name FROM tag
			INNER JOIN Reviewtag ON tag_name = name
			WHERE review_id = :id AND tag_name = :name
			LIMIT 1
			');
		$query->execute(array('name' => $name, 'id' => $id));
		$row = $query->fetch();

		if($row){
			return true;
		}
		return false;
	}

	public static function tags_for_review($id){
		$query = DB::connection()->prepare('
			SELECT * FROM tag
			INNER JOIN Reviewtag ON tag_name = name
			WHERE review_id = :id
			');
		$query->execute(array('id' => $id));
		$rows = $query->fetchAll();
		
		$tags= array();
		foreach($rows as $row){
			$tags[] = new Tag(array(
				'name' => $row['name'],
				'url_id' => $row['url_id']
				));
		}

		return $tags;
	}

	public static function tags_for_review_string($id){
		$query = DB::connection()->prepare('
			SELECT name FROM tag
			INNER JOIN Reviewtag ON tag_name = name
			WHERE review_id = :id
			');
		$query->execute(array('id' => $id));
		$rows = $query->fetchAll();
		
		$tags = '';
		foreach($rows as $row){
			$tags = $tags . ',' . $row['name'];
		}
		$tags = substr($tags, 1);
		return $tags;
	}

	public static function remove_review_tags($id){
		$query = DB::connection()->prepare('DELETE FROM Reviewtag WHERE review_id = :id');
		$query->execute(array('id' => $id));
	}


	public function save(){
		$query = DB::connection()->prepare('INSERT INTO Tag (name) VALUES (:name)');
		$query->execute(array('name' => $this->name));
	}

	public function modify(){
		$query = DB::connection()->prepare('UPDATE Tag SET name = :name WHERE name = :name');
		$query->execute(array('name' => $this->name));

		$query = DB::connection()->prepare('UPDATE Reviewtag SET tag_name = :name WHERE tag_name = :name');
		$query->execute(array('name' => $this->name));
	}

	public function remove(){
		$query = DB::connection()->prepare('DELETE FROM Tag WHERE name = :name');
		$query->execute(array('name' => $this->name));

		$query = DB::connection()->prepare('DELETE FROM Reviewtag WHERE tag_name = :name');
		$query->execute(array('name' => $this->name));
	}


	public static function search($word){
		$word = '%' . $word . '%';
		$query = DB::connection()->prepare('SELECT * FROM Tag WHERE name LIKE :word');
		$query->execute(array('word' => $word));
		$rows = $query->fetchAll();
		$tags= array();

		foreach($rows as $row){
			$tags[] = new Tag(array(
				'name' => $row['name'],
				'url_id' => $row['url_id']
				));
		}

		return $tags;
	}

	public static function add_tag_to_review($tag, $id){
		$query = DB::connection()->prepare('INSERT INTO Reviewtag (review_id, tag_name) VALUES (:id, :name)');
		$query->execute(array('id' => $id, 'name' => $tag));
	}

	public static function split_tags($tagstring) {
		$tagstring = strtolower($tagstring);
		$tags = explode(",", $tagstring);
		return $tags;
	}

	public static function add_tags_to_review($tagstring, $id) {
		$tags = self::split_tags($tagstring);

		foreach($tags as $tag){
			if($tag != null && !(trim($tag) == '') && self::if_exists($tag) == false) {
				$new_tag = new Tag(array(
					'name' => $tag
					));
				$new_tag->save();
			}
			self::add_tag_to_review($tag, $id);
		}
	}
}