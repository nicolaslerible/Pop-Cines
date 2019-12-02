<?php

    class Sala{

        //Parametros
        private $CodSal;
        private $CodCin;
        private $Tipo;
        private $Libre;

        //Constructor
        public function __construct() { }


	    public function getCodSal()
	    {
	        return $this->CodSal;
	    }

	    public function setCodSal($CodSal)
	    {
	        $this->CodSal = $CodSal;

	        return $this;
	    }

	    public function getCodCin()
	    {
	        return $this->CodCin;
	    }

	    public function setCodCin($CodCin)
	    {
	        $this->CodCin = $CodCin;

	        return $this;
	    }

	    public function getTipo()
	    {
	        return $this->Tipo;
        }

	    /**
	     * @param mixed $Tipo
	     *
	     * @return self
	     */
	    public function setTipo($Tipo)
	    {
	        $this->Tipo = $Tipo;

	        return $this;
        }
        
        /**
	     * @return mixed
	     */
	    public function getLibre()
	    {
	        return $this->Libre;
        }

	    /**
	     * @param mixed $Libre
	     *
	     * @return self
	     */
	    public function setLibre($Libre)
	    {
	        $this->Libre = $Libre;

	        return $this;
        }
        
    }

