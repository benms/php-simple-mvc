<?php

class studentActiveRecord extends baseActiveRecord {

	// description of table Students
	// CREATE TABLE Students (
	//          id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	//          first_name VARCHAR(20) default 'Vasiliy',
	//          last_name VARCHAR(20) default 'Pupkin',
	//          sex VARCHAR(6) default 'Male',
	//          grp VARCHAR(10) default 'IT15-1',
	//          faculty VARCHAR(10) default 'FAM',
	//          created TIMESTAMP DEFAULT NOW()
	//        ) ENGINE=INNODB;

	public $first_name;
	public $last_name;
	public $sex;
	public $group;
	public $faculty;

	public function save() {
		if (isset($this->id)) {
			$sql = "UPDATE Students SET
				first_name = :first_name,
				last_name = :last_name,
				sex = :sex,
				grp = :grp,
				faculty = :faculty
				WHERE id = :id";
			$statement = $this->db->prepare($sql);
			$statement->bindParam("first_name", $this->first_name);
			$statement->bindParam("last_name", $this->last_name);
			$statement->bindParam("sex", $this->sex);
			$statement->bindParam("grp", $this->group);
			$statement->bindParam("faculty", $this->faculty);
			$statement->bindParam("id", $this->id);
			$statement->execute();
		} else {
			$sql = "INSERT INTO Students
				(first_name, last_name, sex, grp, faculty)
				VALUES (:first_name, :last_name, :sex, :grp, :faculty)";
			$statement = $this->db->prepare($sql);
			$statement->bindParam("first_name", $this->first_name);
			$statement->bindParam("last_name", $this->last_name);
			$statement->bindParam("sex", $this->sex);
			$statement->bindParam("grp", $this->group);
			$statement->bindParam("faculty", $this->faculty);
			$statement->execute();
			$this->id = $this->db->lastInsertId();
		}
	}

	public function delete() {
		if (isset($this->id)) {
			$sql = "DELETE FROM Students WHERE id = :id";
			$statement = $this->db->prepare($sql);
			$statement->bindParam("id", $this->id);
			$statement->execute();
		}
	}

	/**
	 * @param $arr
	 */
	public function delete_selected($arr) {
		if (isset($arr) and is_array($arr)) {
			foreach ($arr as $value) {
				$this->id = $value;
				$this->delete();
			}
		}
	}

	/**
	 * @return mixed
	 */
	public function find() {
		if (isset($this->id)) {
			$sql = "SELECT * FROM Students WHERE id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam("id", $this->id);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_LAZY);
			// error_log("ActiveRecord >>> find row(" . $this->id . ") = " . $row->last_name);
			return $row;
		}
	}

	/**
	 * @return mixed
	 */
	public function all() {
		$sql = "SELECT * FROM Students";
		$statement = $this->db->prepare($sql);
		$statement->execute();
		return $statement;
	}
}

// Example how to use this class
// $foo = new Foo($db);
// $foo->bar = 'baz';
// $foo->save();

?>