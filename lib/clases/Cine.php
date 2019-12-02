<?php

    class Cine{

        //Parametros
        private $CodCin;
        private $CodAdm;
        private $NomCin;
        private $LocCin;
        private $DirCin;

        //Constructor
        public function __construct() { }


        //Codigo de Cine
	    public function getCodCin()
	    {
	        return $this->CodCin;
	    }

	    public function setCodCin($CodCin)
	    {
	        $this->CodCin = $CodCin;

	        return $this;
        }
        
        //Codigo de Administrador
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
        
        //Nombre de Cine
	    public function getNomCin()
	    {
	        return $this->NomCin;
	    }

	    /**
	     * @param mixed $NomCin
	     *
	     * @return self
	     */
	    public function setNomCin($NomCin)
	    {
	        $this->NomCin = $NomCin;

	        return $this;
        }
        
        //Localidad Cine
	    public function getLocCin()
	    {
	        return $this->LocCin;
	    }

	    /**
	     * @param mixed $LocCin
	     *
	     * @return self
	     */
	    public function setLocCin($LocCin)
	    {
	        $this->LocCin = $LocCin;

	        return $this;
        }
        
        //Direccion Cine
	    public function getDirCin()
	    {
	        return $this->DirCin;
	    }

	    /**
	     * @param mixed $DirCin
	     *
	     * @return self
	     */
	    public function setDirCin($DirCin)
	    {
	        $this->DirCin = $DirCin;

	        return $this;
        }
        
    }