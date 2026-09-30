<?php

class Livro {
    private $titulo;
    private $autor;
    private $preco;

    public function __construct($titulo, $autor = "Autor desconhecido", $preco = 0) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->preco = $preco;
    }

    public static function criarPadrao() {
        return new self("Livro Padrão", "Autor Desconhecido", 0);
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($preco) {
        if ($preco < 0) {
            echo "Erro: preço inválido.<br>";
            return;
        }
        $this->preco = $preco;
    }

    public function exibir() {
        echo "Livro: {$this->titulo} - Autor: {$this->autor} - Preço: R$ " . number_format($this->preco, 2, ',', '.') . "<br>";
    }
}