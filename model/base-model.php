<?php 
	class Base{
		protected $connection;

		function __construct(){
			$this->connection = new mysqli("localhost","root","","3b_11");
		}
	}
?>