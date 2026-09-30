<?php
require_once 'Livro.php';

$livro = new Livro("Dom Casmurro", "Machado de Assis", 50.00);

echo "Preço original:<br>";
$livro->exibir();

$livro->aplicarDescontoPadrao();

echo "<br>Preço com desconto padrão (" . Livro::DESCONTO_PADRAO . "%):<br>";
$livro->exibir();