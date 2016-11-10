<?php
class MethodNotFound extends Exception{
	/**
	* @var string $title
	*/
	protected $title;

  	/**
    * Initializes Exception 
    *
    * @param string $title
    * @param string $message
    * @param int $code
    * @param Exception $previous
    */
	public function __construct($title, $message, $code = 0, Exception $previous = null) {
		$this->title = $title;
		parent::__construct($message, $code, $previous);
	}

	/**
    * Returns the title of the Exception
    *
    * @return string $title
    */
	public function getTitle(){
		return $this->title;
	}
}