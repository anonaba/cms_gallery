<?php 

class Comment extends DB_Object {

	static protected $db_table_name = "comments";
	static protected $db_col_name = ['photo_id','author','body'];
	public $id;
	public $photo_id;
	public $author;
	public $body;

	static public function create_comment($photo_id, $author="John", $body) {

		if(!empty($photo_id) && !empty($author) && !empty($body)) {
			$comment = new Comment;

			$comment->photo_id = $photo_id;
			$comment->author =   $author;
			$comment->body =   $body;

			return $comment;
		} else {
			false;
		}
	}

	static public function find_the_comments($photo_id=0) {

		$db = new Database;

		$sql = "SELECT * FROM ".self::$db_table_name;
		$sql .= " WHERE photo_id = ".$db->escape_string($photo_id);
		$sql .= " ORDER BY photo_id ASC";
		
		return self::find_by_query($sql);
	}

}