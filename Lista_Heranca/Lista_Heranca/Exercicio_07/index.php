<?php

class Entrega {
    public $codigo;
    public $destino;
    public $distancia;

    public function __construct($codigo, $destino, $distancia) {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->distancia = $distancia;
    }

    public function exibirDados() {
        echo "Identificador: " . $this->codigo . " | Local de Entrega: " . $this->destino . " | Distância: " . $this->distancia . " km<br>";
    }
}

class EntregaMoto extends Entrega {
    public $placaVeiculo;
    public $condutor;

    public function __construct($codigo, $destino, $distancia, $placaVeiculo, $condutor) {
        parent::__construct($codigo, $destino, $distancia);
        $this->placaVeiculo = $placaVeiculo;
        $this->condutor = $condutor;
    }

    public function realizarEntrega() {
        echo "Entrega Terrestre por Moto despachada pelo piloto " . $this->condutor . " (Placa " . $this->placaVeiculo . ") com destino a " . $this->destino . " (" . $this->distancia . " km).<br>";
    }
}

class EntregaDrone extends Entrega {
    public $codigoRegistroAnac;
    public $autonomiaMinutos;

    public function __construct($codigo, $destino, $distancia, $codigoRegistroAnac, $autonomiaMinutos) {
        parent::__construct($codigo, $destino, $distancia);
        $this->codigoRegistroAnac = $codigoRegistroAnac;
        $this->autonomiaMinutos = $autonomiaMinutos;
    }

    public function realizarEntrega() {
        if ($this->distancia > 20) {
            echo "Alerta de Operação Rejeitada: O sistema veta envios por drone que ultrapassem 20 km de distância. Distância calculada: " . $this->distancia . " km.<br>";
            return false;
        }
        echo "Envio por Drone aprovado e executado! Registro ANAC: " . $this->codigoRegistroAnac . " | Autonomia de voo: " . $this->autonomiaMinutos . " min | Distância total: " . $this->distancia . " km.<br>";
        return true;
    }
}

$cenarioExecucao = $_GET['cenario'] ?? 'todos';

echo "Exercício 7 — Central de Logística e Entregas<br><br>";

if ($cenarioExecucao === 'valido' || $cenarioExecucao === 'todos') {
    $envioMoto = new EntregaMoto("REM-101", "Rua das Palmeiras, 300", 14, "ZAN-9988", "Thiago Zanella");
    $droneSucesso = new EntregaDrone("AER-201", "Parque Tecnológico, Lote 12", 8, "PP-BR-4401", 45);

    echo "Cenário Válido - Remessa por Moto e Drone (8 km):<br><br>";
    echo "Dados do Envio por Moto:<br>";
    $envioMoto->exibirDados();
    $envioMoto->realizarEntrega();

    echo "<br>Dados do Envio por Drone (8 km):<br>";
    $droneSucesso->exibirDados();
    $droneSucesso->realizarEntrega();
    echo "<br>";
}

if ($cenarioExecucao === 'invalido' || $cenarioExecucao === 'todos') {
    $droneRejeitado = new EntregaDrone("AER-202", "Distrito Industrial, Galpão 5", 25, "PP-BR-4402", 50);

    echo "Cenário Inválido - Remessa por Drone além do limite (25 km):<br><br>";
    echo "Registro da Ordem:<br>";
    $droneRejeitado->exibirDados();
    $droneRejeitado->realizarEntrega();
    echo "<br>";
}

echo "Estrutura Hierárquica e Membros:<br>";
echo "<pre>
+-----------------------------------------------------------------------+
|                              Entrega                                  |
|-----------------------------------------------------------------------|
| - Atributos herdados: codigo, destino, distancia                      |
| - Método herdado: exibirDados()                                       |
+-----------------------------------------------------------------------+
                                    |
          +-------------------------+-------------------------+
          |                                                   |
+-----------------------------------+   +-------------------------------+
|           EntregaMoto             |   |         EntregaDrone          |
|-----------------------------------|   |-------------------------------|
| - Atributos próprios:             |   | - Atributos próprios:         |
|     placaVeiculo, condutor        |   |     codigoRegistroAnac,       |
| - Método específico:              |   |     autonomiaMinutos          |
|     realizarEntrega()             |   | - Método específico:          |
|                                   |   |     realizarEntrega() (<=20km)|
+-----------------------------------+   +-------------------------------+
</pre>";
