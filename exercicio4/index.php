<?php
require_once 'Livro.php';

$livro = Livro::criarPadrao();
$livro->exibir();

$livro->setTitulo("Dom Casmurro");
$livro->setAutor("Machado de Assis");
$livro->setPreco(39.90);
$livro->exibir();