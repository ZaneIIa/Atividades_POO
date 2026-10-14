<?php

class Funcionario {
    public $nome;
    public $cpf;
    public $salario;

    public function __construct($nome, $cpf, $salario) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->salario = $salario;
    }

    public function exibirFuncionario() {
        echo "Colaborador: " . $this->nome . " | Documento CPF: " . $this->cpf . " | Remuneração: R$ " . number_format($this->salario, 2, ',', '.') . "<br>";
    }
}

class Gerente extends Funcionario {
    public $setor;

    public function __construct($nome, $cpf, $salario, $setor) {
        parent::__construct($nome, $cpf, $salario);
        $this->setor = $setor;
    }

    public function realizarReuniao() {
        echo "O gerente " . $this->nome . " iniciou a reunião de alinhamento do setor de " . $this->setor . ".<br>";
    }
}

class Desenvolvedor extends Funcionario {
    public $linguagem;

    public function __construct($nome, $cpf, $salario, $linguagem) {
        parent::__construct($nome, $cpf, $salario);
        $this->linguagem = $linguagem;
    }

    public function programar() {
        echo "O programador " . $this->nome . " está codificando uma aplicação em " . $this->linguagem . ".<br>";
    }
}

$objGerente = new Gerente("Rodrigo Zanella", "234.567.890-12", 9200.00, "Operações");
$objDev = new Desenvolvedor("Lucas Martins", "345.678.901-23", 5800.00, "Python");

$tipoCenario = $_GET['cenario'] ?? 'todos';

echo "Exercício 2 — Gestão de Funcionários<br><br>";

if ($tipoCenario === 'valido' || $tipoCenario === 'todos') {
    echo "Teste de Métodos Válidos:<br><br>";
    echo "Método herdado exibirFuncionario():<br>";
    $objGerente->exibirFuncionario();
    $objDev->exibirFuncionario();

    echo "<br>Métodos específicos de cada subclasse:<br>";
    $objGerente->realizarReuniao();
    $objDev->programar();
    echo "<br>";
}

if ($tipoCenario === 'invalido' || $tipoCenario === 'todos') {
    echo "Teste de Chamada Inválida (item 3):<br><br>";
    echo "Tentativa: \$objGerente->programar();<br><br>";
    try {
        $objGerente->programar();
    } catch (Error $erro) {
        echo "Retorno do sistema: " . $erro->getMessage() . "<br><br>";
        echo "Explicação técnica: A tentativa de chamar programar() falha porque esse método foi implementado na classe Desenvolvedor. Como a classe Gerente descende diretamente de Funcionario, ela não herda comportamentos que são restritos a outras subclasses irmãs.<br>";
    }
}
