<?php
    namespace App\Docente;
    class docentClass
    {
        public $correo;
        public $nombre;
        public $id;
        public $edad;
        public $especializacion;
        public $foto;

        public function __construct($co,$nom,$Id,$ed,$esp,$fot)
        {
            $this->correo = $co;
            $this->nombre = $nom;
            $this->id = $Id;
            $this->edad = $ed;
            $this->especializacion = $esp;
            $this->foto = $fot;
        }
    }