<?php

    require_once("Database.php") ;
	require_once("Administrador.php") ;

	class Sesion
	{
		private $administrador ; 
		private $time_expire = 3000 ;				// segundos
		private static $instancia = null ;

		private function __construct() { }

		private function __clone() { }	

		public function getAdmin() {
			return $this->administrador ;
		}

		/**
		 */
		public function close(){
			$_SESSION = [] ;
			session_destroy() ;
		}

		/**
		 */
		public static function getInstance(){
			session_start() ;

			if (isset($_SESSION["_sesion"])):
				self::$instancia = unserialize($_SESSION["_sesion"] ) ;
			else:
				if (self::$instancia===null) 
					self::$instancia = new Sesion() ;
			endif ;

			return self::$instancia ;
		}

		public function login(string $nom, string $pas):bool{
			$db = Database::getInstance("root","","cine") ;

			$sql = "SELECT * FROM administrador WHERE Nombre='$nom' AND Pass='$pas' ;" ;

			if ($db->query($sql)){

				$this->administrador = $db->getObject("Administrador") ;

				$_SESSION["time"]    = time() ;
				$_SESSION["_sesion"] = serialize(self::$instancia) ;

				return true ;

			}
			return false ;
		}

		/**
		 * @return bool
		 */
		public function isExpired():bool
		{
			return (time() - $_SESSION["time"] > $this->time_expire) ;
		}

		/**
		 * @return bool
		 */
		public function isLogged():bool
		{
			return !empty($_SESSION) ;
		}

		/**
		 * @return bool
		 */
		public function checkActiveSession():bool
		{
			if ($this->isLogged())
				if (!$this->isExpired()) return true ;
			//
			return false ;
		}

		/**
		 */
		public function redirect(string $url)
		{
			header("Location: $url") ;
			die() ;
		}

		/**
		 */
		public function __sleep()
		{
			return ["administrador", "instancia"] ;
		}

	}




