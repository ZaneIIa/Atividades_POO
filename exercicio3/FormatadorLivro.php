<?php

class FormatadorLivro {
    public static function paraMaiusculas($texto) {
        return strtoupper($texto);
    }

    public static function formatarMoeda($valor) {
        return "R$ " . number_format($valor, 2, ',', '.');
    }
}