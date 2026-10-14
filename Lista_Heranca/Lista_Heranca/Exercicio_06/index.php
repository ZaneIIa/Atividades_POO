<?php

class Pessoa {
    public $nome;
    public $email;

    public function __construct($nome, $email) {
        $this->nome = $nome;
        $this->email = $email;
    }

    public function apresentar() {
        echo "Identificação: " . $this->nome . " (E-mail: " . $this->email . ").<br>";
    }
}

class Funcionario extends Pessoa {
    public $salario;
    public $matricula;

    public function __construct($nome, $email, $salario, $matricula) {
        parent::__construct($nome, $email);
        $this->salario = $salario;
        $this->matricula = $matricula;
    }

    public function trabalhar() {
        echo "O empregado " . $this->nome . " (Matrícula: " . $this->matricula . ") está em atividade de trabalho. Remuneração: R$ " . number_format($this->salario, 2, ',', '.') . ".<br>";
    }
}

class Programador extends Funcionario {
    public $linguagemPrincipal;

    public function __construct($nome, $email, $salario, $matricula, $linguagemPrincipal) {
        parent::__construct($nome, $email, $salario, $matricula);
        $this->linguagemPrincipal = $linguagemPrincipal;
    }

    public function programar() {
        echo "O desenvolvedor " . $this->nome . " está programando rotinas em " . $this->linguagemPrincipal . ".<br>";
    }
}

class Designer extends Funcionario {
    public $ferramentaPrincipal;

    public function __construct($nome, $email, $salario, $matricula, $ferramentaPrincipal) {
        parent::__construct($nome, $email, $salario, $matricula);
        $this->ferramentaPrincipal = $ferramentaPrincipal;
    }

    public function criarLayout() {
        echo "A profissional de design " . $this->nome . " está montando protótipos de interfaces no " . $this->ferramentaPrincipal . ".<br>";
    }
}

$devProgramador = new Programador("Guilherme Zanella", "guilherme.zanella@tech.com", 7000.00, "FUNC-1092", "Java");

echo "Exercício 6 — Hierarquia em Três Níveis<br><br>";
echo "Invocando métodos no objeto da classe Programador:<br>";
$devProgramador->apresentar();
$devProgramador->trabalhar();
$devProgramador->programar();
echo "<br>";

echo "Origem da declaração de cada método executado:<br>";
echo "- Método apresentar(): declarado na classe Pessoa (Nível 1)<br>";
echo "- Método trabalhar(): declarado na classe Funcionario (Nível 2)<br>";
echo "- Método programar(): declarado na classe Programador (Nível 3)<br>";
