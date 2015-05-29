<?php

Abstract Class baseController {

/*
 * @registry object
 */
	protected $registry = NULL;
	/*
	 * @request object
	 */
	protected $request = NULL;

	function __construct($registry) {
		$this->registry = $registry;
		$this->request = request::getInstance();
	}

/**
 * @all controllers must contain an index method
 */
	abstract function index();
}

?>
