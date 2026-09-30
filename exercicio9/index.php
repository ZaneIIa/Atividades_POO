<?php
require_once 'Livro.php';

new Livro("Dom Casmurro", "Machado de Assis", 39.90);
new Livro("O Cortiço", "Aluísio Azevedo", 29.90);
new Livro("Memórias Póstumas de Brás Cubas", "Machado de Assis", 45.00);

Livro::listarTodos();