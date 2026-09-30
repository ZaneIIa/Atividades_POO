<?php

class Livro {
    private $titulo;
    private $autor;
    private $preco;

    private static $todos = [];

    public function __construct($titulo, $autor = "Autor desconhecido", $preco = 0) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->preco = $preco;

        self::$todos[] = $this;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function exibir() {
        echo "Livro: {$this->titulo} - Autor: {$this->autor} - Preço: R$ " . number_format($this->preco, 2, ',', '.') . "<br>";
    }

    public static function listarTodos() {
        foreach (self::$todos as $obj) {
            $obj->exibir();
        }
    }
}