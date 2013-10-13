<?php

/**
 * @brif Класс для удобной работы с GET параметрами, кидает исключение
 * если нет установленого параметра Err_UnknownGetParamsKey($Key);
 */
class GetParams {

	/**
	 * @var array
	 */
	private $_params;

	/**
	 * @param array GetParams GET параметры в формате key => value
	 */
	public function __construct(array $GetParams) {
		$this->_params = $GetParams;
	}

	/**
	 * @param string
	 */
	public function __get ($Key) {

		if(isset($this->_params[$Key])) {
			return $this->_params[$Key];
		} else {
			throw new Err_UnknownGetParamsKey($Key);
		}

	}

}

/**
 * @brif Класс для парса URL
 */
class Lib_ParseUrl {

	/**
	 * @var string
	 * @var array
	 * $var array
	 */
	private $_url, $_parsed_data, $_get_params;
	
	/**
	 * @param string 
	 */
	public function __construct($Url) {

		$this->_url = $Url;
		$this->_parsed_data = parse_url($Url);

		$get_params = [];
		$buff = explode('&', $this->_parsed_data['query']);

		foreach($buff as $val) {
			$get_params_buff = explode('=', $val);
			$cnt = count($get_params_buff);
		
			$key = 0;
			for($i = 0; $i < $cnt; ++ $i) {

				if(($i % 2) == 0) {
					$key = $get_params_buff[$i];
				}else {
					$get_params[$key] = $get_params_buff[$i];
				}

			}
		}
		$this->_get_params = new GetParams($get_params);

	}

	/**
	 * @param string
	 */
	public function __get($Key) {

		if(isset($this->_parsed_data[$Key])) {
			return $this->_parsed_data[$Key];
		} else {

			switch($Key) {
			case 'get_params':
				return $this->_get_params;
				break;
            case 'url':
                return $this->_url;
                break;
			default:
				throw new Err_UnknownKey($Key);
			}

		}

	}

}
