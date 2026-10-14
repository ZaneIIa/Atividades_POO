<?php

class Veiculo {
    public $marca;
    public $modelo;
    public $ano;

    public function __construct($marca, $modelo, $ano) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
    }

    public function exibirDados() {
        echo "Veículo: " . $this->marca . " " . $this->modelo . " | Ano de Fabricação: " . $this->ano;
    }
}

class Carro extends Veiculo {
    public $quantidadePortas;

    public function __construct($marca, $modelo, $ano, $quantidadePortas) {
        parent::__construct($marca, $modelo, $ano);
        $this->quantidadePortas = $quantidadePortas;
    }

    public function exibirDados() {
        parent::exibirDados();
        echo " | Número de Portas: " . $this->quantidadePortas . "<br>";
    }
}

class Moto extends Veiculo {
    public $cilindradas;

    public function __construct($marca, $modelo, $ano, $cilindradas) {
        parent::__construct($marca, $modelo, $ano);
        $this->cilindradas = $cilindradas;
    }

    public function exibirDados() {
        parent::exibirDados();
        echo " | Cilindrada: " . $this->cilindradas . " cc<br>";
    }
}

$meuCarro = new Carro("Volkswagen", "Polo Track", 2023, 4);
$minhaMoto = new Moto("Yamaha", "Fazer FZ25", 2024, 250);

echo "Exercício 1 — Cadastro de Veículos<br><br>";

echo "Dados do Carro:<br>";
$meuCarro->exibirDados();
echo "<br>";

echo "Dados da Moto:<br>";
$minhaMoto->exibirDados();
echo "<br>";

echo "Atributos Herdados: marca, modelo, ano<br>";
echo "Atributos Próprios: quantidadePortas (Carro), cilindradas (Moto)<br>";
