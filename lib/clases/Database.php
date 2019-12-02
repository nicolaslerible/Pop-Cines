<?php

	// Nicolás Lerible García
	// Proyecto final DWES
	class Database 
	{
		private $host = "localhost" ;

        //Parametros
		private $dbName ;
		private $dbUser ;
		private $dbPass ;

		private $sqlp = null ;
		private $result = null ;
		private static $instance = null ;

		private function __construct($dbu, $dbp, $dbn) 
		{
			$this->dbUser = $dbu ;
			$this->dbPass = $dbp ;
			$this->dbName = $dbn ;

			$this->connect() ;
		}

		public function __destruct()
		{
			$this->sqlp = null ;
		}

		public static function getInstance($dbu, $dbp, $dbn)
		{
			if (Database::$instance==null) 
				Database::$instance = new Database($dbu, $dbp, $dbn) ;

			return Database::$instance ;
		}

		private function __clone() { }

		private function connect()
		{
			$this->sqlp = new PDO("mysql:host=localhost;dbname=cine;charset=utf8","root","")
						  or die("ERROR: Database.php [linea 44]") ; 
		}

		public function query($sql):bool
		{
			$this->result = $this->sqlp->query($sql) 
								or die("ERROR: Database.php [linea 50]") ;

			if (is_object($this->result))
				return ($this->result->rowCount() > 0) ;

			return $this->result ;
		}

		public function getObject($cls = "StdClass")
		{
			if (is_null($this->result)) return null ;

			return $this->result->fetchObject($cls) ;
		}

		public function __wakeup()
		{
			$this->connect() ;
		}

	}












