<?php
class Post{
	private $db;

	public function __construct(){
		$this->db = new Database;
	}

	public function getPricing(){
		$this->db->query("SELECT * FROM categories ORDER BY id DESC");
		return $this->db->resultSet();
	}

	public function addPost($data){
		$this->db->query('INSERT INTO posts (category, image, description) VALUES (:category, :image, :description)');
		$this->db->bind(':category', $data['category']);
		$this->db->bind(':image', $data['image']);
		$this->db->bind(':description', $data['description']);
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}	
	}

	public function allPosts(){
		$this->db->query("SELECT * FROM posts ORDER BY id DESC");
		return $this->db->resultSet();
	}

	public function removePost($id){
		$this->db->query('DELETE FROM posts WHERE id = :id');
		$this->db->bind(':id', $id);
		if ($this->db->execute()) {
			return true;
		}else{
			return false;
		}
	}

	public function updatePost($data){
		$this->db->query('UPDATE posts SET category = :category, image = :image, description = :description WHERE id = :id');
		$this->db->bind(':id', $data['id']);
		$this->db->bind(':category', $data['category']);
		$this->db->bind(':image', $data['image']);
		$this->db->bind(':description', $data['description']);
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}	
	}

	public function existingPost($id){
		$this->db->query("SELECT * FROM posts WHERE id = :id");
		$this->db->bind(':id', $id);
		$row = $this->db->single();
		if($this->db->rowCount() > 0){
			return $row;
		}else{
			return false;
		}
	}
	
}