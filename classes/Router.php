<?php

class Router{
	
	private $controller;
	private $action;
	private $request;

	public function __construct($request){
	
		$this->request = $request;

		if($this->request['controller'] == ''){
			$this->controller = 'home';
		} else {
			$this->controller = $this->request['controller'];
		}

		if($this->request['action'] == ''){
			$this->action = 'index';
		} else {
			$this->action = $this->request['action'];
		}

	}

	public function createController(){
		
		$file =  "controller/". strtolower($this->controller) .".php";
		if(file_exists($file)){
			require_once $file;
		}

		if(class_exists($this->controller)){
			$parents = class_parents($this->controller);
			// Check Extend
			if(in_array("Controller", $parents)){
				if(method_exists($this->controller, $this->action)){
					return new $this->controller($this->action, $this->request);
				} else {
					// Method Does Not Exist
					require_once "views/404.php";
					// echo '<h1>Method does not exist</h1>';
					return;
				}
			} else {
				// Base Controller Does Not Exist
				require_once "views/404.php";
				// echo '<h1>Base Controller Does Not Exist</h1>';
				return;
			}
		} else {
			// Controller Class Does Not Exist
			require_once "views/404.php";
			// echo '<h1>Controller class does not exist</h1>';
			return;
		}
	}
}

?>