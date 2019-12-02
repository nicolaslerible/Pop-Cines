<?php

    class Administrador{

        //Parametros
        private $CodAdm;
        private $Nombre;
        private $Pass;

        //Constructor
        public function __construct() { }

        /**
	     * @return mixed
	     */
	    public function getCodAdm()
	    {
	        return $this->CodAdm;
	    }

	    /**
	     * @param mixed $CodAdm
	     *
	     * @return self
	     */
	    public function setCodAdm($CodAdm)
	    {
	        $this->CodAdm = $CodAdm;

	        return $this;
	    }

        /**
	     * @return mixed
	     */
	    public function getNombre()
	    {
	        return $this->Nombre;
	    }

	    /**
	     * @param mixed $Nombre
	     *
	     * @return self
	     */
	    public function setNombre($Nombre)
	    {
	        $this->Nombre = $Nombre;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getPass()
	    {
	        return $this->Pass;
        }

	    /**
	     * @param mixed $pass
	     *
	     * @return self
	     */
	    public function setPass($Pass)
	    {
	        $this->Pass = $Pass;

	        return $this;
	    }

    }

