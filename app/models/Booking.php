<?php
class Booking{
	private $db;

	public function __construct(){
		$this->db = new Database;
	}

    public function allBookings(){
		$this->db->query("SELECT * FROM bookings");
		return $this->db->resultSet();
    }

    public function category($data){
        $this->db->query('INSERT INTO categories (category, description, price) VALUES (:category, :description, :price)');
		$this->db->bind(':category', $data['category']);
		$this->db->bind(':description', $data['description']);
		$this->db->bind(':price', $data['price']);
		
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}	
    }

    public function getCategory(){
        $this->db->query("SELECT * FROM categories");
		return $this->db->resultSet();
    }

	public function getUserByCategory($id){
		$this->db->query("SELECT * FROM categories WHERE id = :id");
		$this->db->bind(':id', $id);
		$row = $this->db->single();
		return $row;
	}

	public function editCategory($data){
		$this->db->query("UPDATE categories SET category = :category, description = :description, price = :price WHERE id = :id");
		
		$this->db->bind(':id', $data['id']);
		$this->db->bind(':description', $data['description']);
		$this->db->bind(':category', $data['category']);
		$this->db->bind(':price', $data['price']);

		if($this->db->execute()){
			return true;
		}else{
			return false;
		}

	}

	public function removeCategory($id){
		$this->db->query("DELETE FROM categories WHERE id = :id");
		$this->db->bind(':id', $id);
		if($this->db->execute()){
			return true;
		}else{
			return false;
		}
	}

	public function saveCategory($data){
		$this->db->query('INSERT INTO bookings (category, user_id) VALUES (:category, :id)');
		$this->db->bind(':id', $_SESSION['user_id']);
		$this->db->bind(':category', $data['category']);
		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}	
	}

	public function getBookingId($id){
		$this->db->query("SELECT * FROM bookings WHERE user_id = :id ORDER BY id DESC LIMIT 1");
		$this->db->bind(':id', $id);
		$row = $this->db->single();
		return $row;
	}

	public function getMatchingPrice($category){
		$this->db->query("SELECT *, bookings.category as bookingsCat, categories.category as categoriesCat FROM bookings INNER JOIN categories on bookings.category = categories.category WHERE categories.category = :category");
		$this->db->bind(':category', $category);
		$row = $this->db->single();
		return $row;
		
	}

	public function bookSession($data){
		$this->db->query("UPDATE bookings SET name = :name, email = :email, phone = :phone, price = :price, location = 'office', book_date = :date WHERE id = :id");
		$this->db->bind(':id', $data['id']);
		$this->db->bind(':name', $data['name']);
		$this->db->bind(':email', $data['email']);
		$this->db->bind(':phone', $data['phone']);
		$this->db->bind(':price', $data['price']);
		$this->db->bind(':date', $data['date']);

		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function bookSelf($data){
		$this->db->query("UPDATE bookings SET name = :name, email = :email, phone = :phone, price = :price, location = 'self_location', state = :state, town = :town, address = :address, book_date = :date WHERE id = :id");
		$this->db->bind(':id', $data['id']);
		$this->db->bind(':name', $data['name']);
		$this->db->bind(':email', $data['email']);
		$this->db->bind(':phone', $data['phone']);
		$this->db->bind(':price', $data['price']);
		$this->db->bind(':state', $data['state']);
		$this->db->bind(':town', $data['town']);
		$this->db->bind(':address', $data['addr']);
		$this->db->bind(':date', $data['date']);

		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function updatePay($data){
		$this->db->query("UPDATE bookings SET status = :status WHERE id = :id");
		$this->db->bind(':id', $data['id']);
		$this->db->bind(':status', $data['status']);

		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function updateDate($data){
		$this->db->query("UPDATE bookings SET date_status = :status WHERE id = :id");
		$this->db->bind(':id', $data['id']);
		$this->db->bind(':status', $data['status']);

		if ($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function myBookings($id){
		$this->db->query("SELECT * FROM bookings WHERE user_id = :id ORDER BY created_at DESC");
		$this->db->bind(':id', $id);
		return $this->db->resultSet();
	}

	public function viewSingle($id){
		$this->db->query("SELECT * FROM bookings WHERE id = :id");
		$this->db->bind(':id', $id);
		$row = $this->db->single();
		return $row;
	}

	public function dateExist($date){
		$this->db->query("SELECT * FROM bookings WHERE book_date = :date AND status = 'received' AND date_status = 'accepted'");
		$this->db->bind(':date', $date);
		$row = $this->db->single();
		return $row;
	}

}