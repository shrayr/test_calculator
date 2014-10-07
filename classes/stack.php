<?php

/**
 * Stack Class.
 *
 *  Base stack class for our calculator, in future if needed we can add other stack functions like next(), key(), prev(), shift(), etc....
 *
 *  Or we can use php's SplStack class
 *  http://php.net/manual/en/class.splstack.php
 *
 * @date: 10/7/14
 * @author Hrayr Shahbazyan
 */

class Stack {

	private $index;
	private $stack;

	/**
	 *
	 * Initializes the stack
	 */
	public function __construct() {
		//define the private vars
		$this->stack = array();
		$this->index = -1;
	}

	/**
	 * Peek
	 *
	 * Return last element of stack
	 *
	 * @return Mixed element or false
	 */
	public function peek() {
		if($this->index > -1)
			return $this->stack[$this->index];
		else
			return false;
	}

	/**
	 * Push
	 *
	 * Adds element to the stack
	 *
	 * @param Mixed Element to add
	 */
	public function push($data) {
        $this->stack[++$this->index] = $data;
	}

	/**
	 * Pop
	 *
	 * Return last element of stack and remove it from stack
	 *
	 * @return Mixed Element
	 */
	public function pop() {
		if($this->index > -1)
		{
			$this->index--;
			return $this->stack[$this->index+1];
		}
		else
			return false;
	}

}
