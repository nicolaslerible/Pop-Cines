<?php

    class Emision{

        //Parametros
        private $CodEmi;
        private $CodSal;
        private $CodPel;
        private $CodCin;
		private $FecEmi;
		private $titulo;
		private $argumento;
        private $poster;
        private $duracion;
        private $genero;

        public function __construct() { }


	    public function getCodEmi()
	    {
	        return $this->CodEmi;
	    }

	    public function setCodEmi($CodEmi)
	    {
	        $this->CodEmi = $CodEmi;

	        return $this;
	    }

	    public function getCodSal()
	    {
	        return $this->CodSal;
	    }

	    public function setCodSal($CodSal)
	    {
	        $this->CodSal = $CodSal;

	        return $this;
        }
        
        public function getCodPel()
	    {
	        return $this->CodPel;
	    }

	    public function setCodPel($CodPel)
	    {
	        $this->CodPel = $CodPel;

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

        public function getFecEmi()
	    {
	        return $this->FecEmi;
	    }

	    public function setFecEmi($FecEmi)
	    {
	        $this->FecEmi = $FecEmi;

	        return $this;
		}
		
		/**
	     * @return mixed
	     */
	    public function getTitulo()
	    {
	        return $this->titulo;
	    }

	    /**
	     * @param mixed $titulo
	     *
	     * @return self
	     */
	    public function setTitulo($titulo)
	    {
	        $this->titulo = $titulo;

	        return $this;
		}
		
		/**
	     * @return mixed
	     */
	    public function getArgumento()
	    {
	        return $this->argumento;
        }

	    /**
	     * @param mixed $argumento
	     *
	     * @return self
	     */
	    public function setArgumento($argumento)
	    {
	        $this->argumento = $argumento;

	        return $this;
        }
        
        /**
	     * @return mixed
	     */
	    public function getPoster()
	    {
	        return $this->poster;
        }

	    /**
	     * @param mixed $poster
	     *
	     * @return self
	     */
	    public function setPoster($poster)
	    {
	        $this->poster = $poster;

	        return $this;
	    }

        /**
	     * @return mixed
	     */
	    public function getDuracion()
	    {
	        return $this->duracion;
        }

	    /**
	     * @param mixed $duracion
	     *
	     * @return self
	     */
	    public function setDuracion($duracion)
	    {
	        $this->duracion = $duracion;

	        return $this;
        }
        /**
	     * @return mixed
	     */
	    public function getGenero()
	    {
	        return $this->genero;
        }

	    /**
	     * @param mixed $genero
	     *
	     * @return self
	     */
	    public function setGenero($genero)
	    {
	        $this->genero = $genero;

	        return $this;
	    }
        
    }

