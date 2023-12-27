<?php

abstract class Controller{

	protected $request;
	protected $action;

	public function __construct($action, $request){
		$this->action = $action;
		$this->request = $request;
	}

	public function runAction(){
		return $this->{$this->action}();
	}

	public function getView(){
		$view = 'views/' .  strtolower(get_class($this)) . '/' . $this->action . '.php';
		
		if(file_exists($view)){
			return $view;
		} else {
			return 'views/404.php';
		}
	}

}

?>