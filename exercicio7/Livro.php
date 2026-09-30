<?php

class Livro {
    const STATUS_DISPONIVEL = "Disponível";
    const STATUS_EMPRESTADO = "Emprestado";
    const STATUS_RESERVADO = "Reservado";

    private $titulo;
    private $autor;
    private $status;

    public function __construct($titulo, $autor = "Autor desconhecido", $status = self::STATUS_DISPONIVEL) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->status = $status;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function exibir() {
        echo "Livro: {$this->titulo} - Autor: {$this->autor} - Status: {$this->status}<br>";
    }
}