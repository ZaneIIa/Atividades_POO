<?php
require_once 'Livro.php';

$livro1 = new Livro("Dom Casmurro", "Machado de Assis", Livro::STATUS_DISPONIVEL);
$livro2 = new Livro("O Cortiço", "Aluísio Azevedo", Livro::STATUS_RESERVADO);

$livro1->setStatus(Livro::STATUS_EMPRESTADO);

$livro1->exibir();
$livro2->exibir();