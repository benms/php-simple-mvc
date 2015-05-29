<?php

class request {

	private $args = array();
	/*
	 * @the data from request
	 */
	public $params;

	/**
	 * our instance of class
	 * @var SingletonTest
	 */
	protected static $instance = NULL;

	/**
	 * 	private constructor for singleton
	 **/
	private function __construct() {
	}

	/**
	 *
	 * Return instance of request
	 * @return object request
	 * @access public
	 *
	 */
	public static function getInstance() {
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 *
	 * @get the controller
	 * @access public
	 *
	 */
	private function getReqData() {
		/*** get the req data from the url ***/
		foreach ($_GET as $key => $value) {
			$exp_key = explode('-', $key);
			if ($exp_key[0] == 'dt') {
				$arr_result[$exp_key[1]] = $value;
			}
		}

		if (isset($arr_result)) {
			$this->params = $arr_result;
		} else { $this->params = array('error' => '[NULL]');}

		// return $this;
	}

	public function getReqSelItems() {
		/*** get the req data from the url ***/
		$arr_result = array();
		foreach ($_GET as $key => $value) {
			$exp_key = explode('-stud_check_', $key);
			if ($exp_key[0] == 'dt') {
				array_push($arr_result, $exp_key[1]);
			}
		}
		return $arr_result;
	}

	/**
	 * @return mixed
	 */
	public function getAsString() {
		/*** get the req data from the url ***/
		$this->getReqData();
		$out = '';
		foreach ($this->params as $key => $value) {
			$out .= ' dt[' . $key . ']=' . $value;
		}
		return $out;
	}

	/**
	 * @return mixed
	 */
	public function getAsArray() {
		/*** get the req data from the url ***/
		$this->getReqData();
		return $this->params;
	}

	/**
	 * @return mixed
	 */
	public function getAsHash() {
		/*** get the req data from the url ***/
		return $this->getAsArray();
	}

	/**
	 * @param $key
	 */
	public function get($key) {
		/*** get the req data from the url ***/
		$hash = $this->getAsArray();
		return isset($hash[$key]) ? $hash[$key] : '';
	}

	/**
	 *
	 * Like the constructor, we make __clone private
	 * so nobody can clone the instance
	 *
	 */
	private function __clone() {
	}
}

?>
