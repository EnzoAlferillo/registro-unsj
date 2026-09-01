<?php

class Persona {
    private $nombre;
    private $apellido;
    private $edad;
    private $email;
    private $telefono;

    public function __construct($nombre, $apellido, $edad, $email, $telefono) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        $this->email = $email;
        $this->telefono = $telefono;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function mostrarInfo() {
        return "Nombre: " . $this->nombre . " " . $this->apellido . 
               ", Edad: " . $this->edad . 
               ", Email: " . $this->email . 
               ", Teléfono: " . $this->telefono;
    }
}

?>
