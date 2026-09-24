<?php

namespace Controller;

Class MediaController {

    //private $mediaModel

    public function __construct() {

    }

    private function verifyNegativeNumbers(float $nota1, float $nota2) {
        if ($nota1 < 0 || $nota2 < 0) {
            return [
                "nota" => null,
                "BMIrange" => "As notas devem conter valores positivos"
            ];
        }
    }
}