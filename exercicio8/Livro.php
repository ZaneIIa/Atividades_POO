<?php

class Livro {
    const DESCONTO_PADRAO = 10;

    private $titulo;
    private $autor;
    private $preco;

    public static $totalLivros = 0;

    public function __construct($titulo, $autor = "Autor desconhecido", $preco = 0) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->setPreco($preco);

        self::$totalLivros++;
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

    public function aplicarDescontoPadrao() {
        $this->preco = $this->preco - ($this->preco * (self::DESCONTO_PADRAO / 100));
    }

    public function exibir() {
        echo "Livro: {$this->titulo} - Autor: {$this->autor} - Preço: R$ " . number_format($this->preco, 2, ',', '.') . "<br>";
    }
}