<?php
require_once 'Livro.php';

$livro1 = new Livro("Dom Casmurro", "Machado de Assis", 39.90);
$livro2 = new Livro("O Cortiço", "Aluísio Azevedo", 29.90);
$livro3 = new Livro("Memórias Póstumas de Brás Cubas", "Machado de Assis", 45.00);

$livro1->exibir();
$livro2->exibir();
$livro3->exibir();

echo "<br>Total de livros criados: " . Livro::$totalLivros;