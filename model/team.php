<?php

class TeamModel extends Model
{
	public function Index()
	{
		return;
	}
	
	private function validateInput($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	public function AddTeam(){

	}
}
