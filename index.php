<?php
$totalExercicios = 9;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista 2 - POO em PHP</title>
</head>
<body>
    <h1>Lista de Exercícios 2 - Métodos Estáticos e Constantes de Classe</h1>
    <ul>
        <?php for ($i = 1; $i <= $totalExercicios; $i++): ?>
            <li><a href="exercicio<?php echo $i; ?>/">Exercício <?php echo $i; ?></a></li>
        <?php endfor; ?>
    </ul>
    <p><a href="../index.php">Voltar</a></p>
</body>
</html>