<?php

    class Pelicula{

        //Parametros
        private $CodPel;
        private $titulo;
        private $argumento;
        private $poster;
        private $duracion;
        private $genero;

        //Constructor
        public function __construct() { }

        /**
	     * @return mixed
	     */
	    public function getCodPel()
	    {
	        return $this->CodPel;
	    }

	    /**
	     * @param mixed $CodPel
	     *
	     * @return self
	     */
	    public function setCodPel($CodPel)
	    {
	        $this->CodPel = $CodPel;

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

