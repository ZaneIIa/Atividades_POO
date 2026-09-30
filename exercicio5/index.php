<?php
/*
Diferença entre self::$algo e $this->algo:

self:: acessa propriedades e métodos estáticos da classe. Não precisa de um objeto instanciado na memória para funcionar.
$this-> acessa atributos e métodos de uma instância específica. Só funciona dentro de um objeto criado com new.

Dentro de um método static não dá para usar $this-> porque o método estático roda no nível da classe e não sabe qual objeto está sendo chamado (não está em contexto de objeto).

Teste proposital de erro:
Tentei usar $this dentro de um método estático:

class Livro {
    public $titulo = "Dom Casmurro";

    public static function mostrarTitulo() {
        return $this->titulo;
    }
}
Livro::mostrarTitulo();

Erro gerado:
Fatal error: Uncaught Error: Using $this when not in object context in C:\xampp\htdocs\poo-php-exercicios\lista2\exercicio5\index.php:18

Código corrigido abaixo:
*/

class Livro {
    private $titulo;
    public static $categoria = "Literatura";

    public function __construct($titulo) {
        $this->titulo = $titulo;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    // Corrigido: método static acessando propriedade static usando self::
    public static function getCategoria() {
        return self::$categoria;
    }
}

$livro = new Livro("Dom Casmurro");
echo "Livro: " . $livro->getTitulo() . "<br>";
echo "Categoria: " . Livro::getCategoria() . "<br>";