<?php

class ContaBancaria {
    public $titular;
    public $saldo;

    public function __construct($titular, $saldo = 0) {
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    public function depositar($valor) {
        if ($valor > 0) {
            $this->saldo += $valor;
            echo "Depósito confirmado: R$ " . number_format($valor, 2, ',', '.') . " creditados na conta.<br>";
        } else {
            echo "Tentativa de depósito com valor inválido.<br>";
        }
    }

    public function sacar($valor) {
        if ($valor > $this->saldo) {
            echo "Operação não autorizada: Saldo insuficiente para efetuar o saque de R$ " . number_format($valor, 2, ',', '.') . ".<br>";
            return false;
        } elseif ($valor <= 0) {
            echo "Quantia de saque informada é inválida.<br>";
            return false;
        } else {
            $this->saldo -= $valor;
            echo "Saque concluído: R$ " . number_format($valor, 2, ',', '.') . " retirados da conta.<br>";
            return true;
        }
    }

    public function consultarSaldo() {
        echo "Correntista: " . $this->titular . " | Saldo Atual: R$ " . number_format($this->saldo, 2, ',', '.') . "<br>";
    }
}

class ContaCorrente extends ContaBancaria {
    public $limite;

    public function __construct($titular, $saldo, $limite) {
        parent::__construct($titular, $saldo);
        $this->limite = $limite;
    }

    public function usarLimite($valor) {
        if ($valor <= $this->limite) {
            $this->limite -= $valor;
            $this->saldo += $valor;
            echo "Limite especial utilizado: R$ " . number_format($valor, 2, ',', '.') . ".<br>";
        } else {
            echo "Limite de crédito indisponível.<br>";
        }
    }
}

class ContaPoupanca extends ContaBancaria {
    public $taxaRendimento;

    public function __construct($titular, $saldo, $taxaRendimento) {
        parent::__construct($titular, $saldo);
        $this->taxaRendimento = $taxaRendimento;
    }

    public function aplicarRendimento() {
        $lucro = $this->saldo * ($this->taxaRendimento / 100);
        $this->saldo += $lucro;
        echo "Rendimento mensal aplicado no percentual de " . $this->taxaRendimento . "%.<br>";
    }
}

$tipoOperacao = $_GET['cenario'] ?? 'todos';

echo "Exercício 5 — Sistema de Contas Bancárias<br><br>";

if ($tipoOperacao === 'valido' || $tipoOperacao === 'todos') {
    $minhaConta = new ContaBancaria("Matheus Zanella", 1000.00);

    echo "Cenário Válido - Fluxo de Depósito e Saque:<br><br>";
    echo "Saldo Inicial:<br>";
    $minhaConta->consultarSaldo();

    echo "<br>Efetuando Movimentações:<br>";
    $minhaConta->depositar(500.00);
    $minhaConta->sacar(200.00);

    echo "<br>Saldo Consolidado:<br>";
    $minhaConta->consultarSaldo();
    echo "<br>";
}

if ($tipoOperacao === 'invalido' || $tipoOperacao === 'todos') {
    $contaVerificacao = new ContaBancaria("Matheus Zanella", 1300.00);

    echo "Cenário Inválido - Tentativa de Saque Acima do Disponível:<br><br>";
    echo "Saldo em Conta antes do Saque:<br>";
    $contaVerificacao->consultarSaldo();

    echo "<br>Ordem de Saque no valor de R$ 2.000,00:<br>";
    $contaVerificacao->sacar(2000.00);

    echo "<br>Conferência do Saldo pós-recusa (permaneceu inalterado):<br>";
    $contaVerificacao->consultarSaldo();
}
