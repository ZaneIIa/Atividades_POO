<?php
require_once 'Livro.php';
require_once 'FormatadorLivro.php';

$livro1 = new Livro("Dom Casmurro", "Machado de Assis", 50.00);
$livro2 = new Livro("O Cortiço", "Aluísio Azevedo", 30.00);

$livro1->exibir();
$livro2->exibir();

echo "<br>";
echo "Título formatado: " . FormatadorLivro::paraMaiusculas($livro1->getTitulo()) . "<br>";
echo "Preço formatado: " . FormatadorLivro::formatarMoeda($livro1->getPreco()) . "<br>";

$livro1->aplicarDescontoPadrao();
echo "Com desconto padrão de " . Livro::DESCONTO_PADRAO . "%: " . FormatadorLivro::formatarMoeda($livro1->getPreco()) . "<br>";

echo "<br>Total de livros criados: " . Livro::$totalLivros . "<br>";