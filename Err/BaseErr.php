<?php

class Err_BaseErr extends Exception {

	/**
	 * @var string
	 */
	protected $priv_message;

	/**
	 * @param string
	 * @param bool
	 */
	public function __construct($message = "unknown BaseErr", $priv_message = false ) {
		//parent::__construct($message, $code);
		$codes = explode( '_' , get_class($this));
		$this->code = end($codes);
		$this->message = $message;
		$this->priv_message = ($priv_message === false ? $this->message : $priv_message);
	}

	/**
	 * @return string
	 */
	public function getPrivMessage() {
		return $this->priv_message;
	}

}
