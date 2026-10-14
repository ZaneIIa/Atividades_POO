<?php

class Produto {
    public $nome;
    public $preco;
    public $codigo;

    public function __construct($nome, $preco, $codigo) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->codigo = $codigo;
    }

    public function exibirProduto() {
        echo "Item: " . $this->nome . " | Ref: " . $this->codigo . " | Valor: R$ " . number_format($this->preco, 2, ',', '.') . "<br>";
    }

    public function aplicarDesconto($percentual) {
        if ($percentual <= 0) {
            echo "Aviso: Percentual de desconto inválido (" . $percentual . "%). O valor do item não sofreu alteração.<br>";
            return false;
        }
        $abatimento = $this->preco * ($percentual / 100);
        $this->preco -= $abatimento;
        echo "Desconto de " . $percentual . "% concedido com sucesso.<br>";
        return true;
    }
}

class Livro extends Produto {
    public $autor;
    public $isbn;

    public function __construct($nome, $preco, $codigo, $autor, $isbn) {
        parent::__construct($nome, $preco, $codigo);
        $this->autor = $autor;
        $this->isbn = $isbn;
    }

    public function exibirProduto() {
        echo "Livro: " . $this->nome . " | Escritor: " . $this->autor . " | ISBN: " . $this->isbn . " | Valor: R$ " . number_format($this->preco, 2, ',', '.') . "<br>";
    }
}

class Eletronico extends Produto {
    public $marca;
    public $garantiaMeses;

    public function __construct($nome, $preco, $codigo, $marca, $garantiaMeses) {
        parent::__construct($nome, $preco, $codigo);
        $this->marca = $marca;
        $this->garantiaMeses = $garantiaMeses;
    }

    public function exibirProduto() {
        echo "Aparelho Eletrônico: " . $this->nome . " | Fabricante: " . $this->marca . " | Garantia: " . $this->garantiaMeses . " meses | Valor: R$ " . number_format($this->preco, 2, ',', '.') . "<br>";
    }
}

$cenarioAtual = $_GET['cenario'] ?? 'todos';

echo "Exercício 4 — Catálogo de Produtos da Loja<br><br>";

if ($cenarioAtual === 'valido' || $cenarioAtual === 'todos') {
    $itemLivro = new Livro("O Programador Pragmático", 100.00, "LIV-88", "David Thomas", "978-8577807000");
    $itemEletronico = new Eletronico("Notebook Lenovo IdeaPad", 2000.00, "NOT-55", "Lenovo", 12);

    echo "Cenário de Descontos Válidos (10% e 15%):<br><br>";
    echo "Valores Iniciais:<br>";
    $itemLivro->exibirProduto();
    $itemEletronico->exibirProduto();

    echo "<br>Processando Descontos:<br>";
    $itemLivro->aplicarDesconto(10);
    $itemEletronico->aplicarDesconto(15);

    echo "<br>Valores Atualizados:<br>";
    $itemLivro->exibirProduto();
    $itemEletronico->exibirProduto();
    echo "<br>";
}

if ($cenarioAtual === 'invalido' || $cenarioAtual === 'todos') {
    $itemTeste = new Livro("O Programador Pragmático", 100.00, "LIV-88", "David Thomas", "978-8577807000");

    echo "Cenário de Validação com Valor Negativo:<br><br>";
    echo "Valor Original:<br>";
    $itemTeste->exibirProduto();

    echo "<br>Tentativa com desconto de -10%:<br>";
    $itemTeste->aplicarDesconto(-10);

    echo "<br>Valor após a tentativa (mantido):<br>";
    $itemTeste->exibirProduto();
}
