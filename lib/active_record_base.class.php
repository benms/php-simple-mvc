<?php

/**
 * @Base abstract class for active record class
 */
Abstract Class baseActiveRecord {

	/**
	 * @injected db class PDO
	 */
	protected $db;

	/**
	 * @id column is using in all tables
	 */
	public $id;

	/**
	 *
	 * @constructor
	 * @access public
	 * @param PDO db
	 */
	public function __construct(PDO $db) {
		$this->db = $db;
	}

/**
 * @all controllers must contain an index method
 */
	abstract function save();
}

?>
