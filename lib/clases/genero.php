<?php

    class Genero{

        //Parametros
        private $CodGen;
        private $NomGen;

        public function __construct() { }


	    public function getCodGen()
	    {
	        return $this->CodGen;
	    }

	    public function setCodGen($CodGen)
	    {
	        $this->CodGen = $CodGen;

	        return $this;
	    }

	    public function getNomGen()
	    {
	        return $this->NomGen;
	    }

	    public function setNomGen($NomGen)
	    {
	        $this->NomGen = $NomGen;

	        return $this;
	    }
        
    }

