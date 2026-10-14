<?php

class Pessoa {
    public $nome;
    public $idade;
    public $email;

    public function __construct($nome, $idade, $email) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->email = $email;
    }

    public function apresentar() {
        echo "Apresentação: Me chamo " . $this->nome . ", tenho " . $this->idade . " anos e meu contato é " . $this->email . ".<br>";
    }
}

class Aluno extends Pessoa {
    public $matricula;
    public $curso;

    public function __construct($nome, $idade, $email, $matricula, $curso) {
        parent::__construct($nome, $idade, $email);
        $this->matricula = $matricula;
        $this->curso = $curso;
    }

    public function estudar() {
        echo "O estudante " . $this->nome . " (Matrícula " . $this->matricula . ") está revisando os conteúdos de " . $this->curso . ".<br>";
    }
}

class Professor extends Pessoa {
    public $especialidade;
    public $salario;

    public function __construct($nome, $idade, $email, $especialidade, $salario) {
        parent::__construct($nome, $idade, $email);
        $this->especialidade = $especialidade;
        $this->salario = $salario;
    }

    public function ministrarAula() {
        echo "O docente " . $this->nome . " está ministrando aula prática sobre " . $this->especialidade . ".<br>";
    }
}

$estudante1 = new Aluno("Gabriel Zanella", 21, "gabriel.zanella@univ.edu.br", "RA-55412", "Ciência da Computação");
$estudante2 = new Aluno("Beatriz Santos", 19, "beatriz.s@univ.edu.br", "RA-55413", "Análise e Desenvolvimento de Sistemas");
$docente = new Professor("Prof. Me. André Castro", 38, "andre.castro@univ.edu.br", "Estrutura de Dados", 8200.00);

echo "Exercício 3 — Sistema de Controle Acadêmico<br><br>";

echo "Estudante 1:<br>";
$estudante1->apresentar();
$estudante1->estudar();
echo "<br>";

echo "Estudante 2:<br>";
$estudante2->apresentar();
$estudante2->estudar();
echo "<br>";

echo "Docente:<br>";
$docente->apresentar();
$docente->ministrarAula();
echo "<br>";

echo "Explicação: O método apresentar() funciona em Aluno e Professor porque ambas as classes estendem Pessoa, herdando de forma direta todos os métodos públicos da superclasse.<br>";
