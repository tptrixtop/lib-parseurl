<?php

/**
 * @brief Заданный ключ в классе GetParamsнесуществует
 **/
class Err_UnknownGetParamsKey extends Err_BaseErr {

	/**
	 * @var string
	 */
	private $err_key;

	/**
	 * @param string
	 */
	public function __construct($key) {
		$this->err_key = $key;
		parent::__construct('Unknown GET params key='.$key);
	}

	/**
	 * @return string
	 */
	public function getKey() {
		return $this->err_key;
	}

}
