<?php
class User{
	private $db;

	public function __construct(){
		$this->db = new Database;
	}

	public function signUp($data){
		$this->db->query('INSERT INTO users (name, email, phone, password, role) VALUES (:name, :email, :phone, :password, 2)');
		$this->db->bind(':name', $data['name']);
		$this->db->bind(':email', $data['email']);
		$this->db->bind(':phone', $data['phone']);
		$this->db->bind(':password', $data['password']);
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}	

	}

	public function findUserByEmail($email){
		$this->db->query("SELECT * FROM users WHERE email = :email");
		$this->db->bind(':email', $email);
		$row = $this->db->single();
		if ($this->db->rowCount() > 0) {
			return true;
		}else{
			return false;
		}

	}

	public function login($email, $password){
		$this->db->query("SELECT * FROM users WHERE email = :email");
		$this->db->bind(':email', $email);
		$row = $this->db->single();

		$hashed_password = $row->password;
		if (password_verify($password, $hashed_password)) {
			return $row;
		}else{
			return false;
		}
	}
	
	public function getUserById($id){
		$this->db->query("SELECT * FROM users WHERE id = :id");
		$this->db->bind(':id', $id);
		$row = $this->db->single();
		return $row;
	}

	public function setToken($data){
		$this->db->query('INSERT INTO reset_password (email, token) VALUES (:email, :token)');
		$this->db->bind(':email', $data['email']);
		$this->db->bind(':token', $data['token']);
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}	
	}

	public function getMyToken($email){
		$this->db->query("SELECT * FROM reset_password WHERE email = :email ORDER BY id DESC LIMIT 1");
		$this->db->bind(':email', $email);
		$row = $this->db->single();
		return $row;
	}

	public function changePass($data){
		$this->db->query("UPDATE users SET password = :New_password WHERE email = :email");
		$this->db->bind(':email', $data['email']);
		$this->db->bind(':New_password', $data['New_password']);

		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	
}