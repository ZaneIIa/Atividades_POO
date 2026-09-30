<?php
require_once 'Livro.php';

$livro1 = new Livro("Clean Code", "Robert C. Martin", 89.90);
$livro2 = new Livro("O Programador Pragmático", "Andrew Hunt", 79.50);
$livro3 = new Livro("Entendendo Algoritmos", "Aditya Bhargava", 54.00);

$livro1->exibir();
$livro2->exibir();
$livro3->exibir();

echo "<br>";
echo "Total de livros: " . Livro::$totalLivros . "<br>";
echo "Valor acumulado em estoque: R$ " . number_format(Livro::$valorTotalEstoque, 2, ',', '.') . "<br>";