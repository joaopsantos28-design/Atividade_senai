<?php

namespace Controller;

Class MediaController {

    //private $mediaModel

    public function __construct(private $mediaModel) {

        //$this->mediaModel = new Media();

    }


    /**
     * Checking nagetive nomes
     * @param float $nota1
     * @param float $nota2
     * @return array|null
     */
    private function verifyNegativeNotes(float $nota1, float $nota2) {
        if ($nota1 < 0 || $nota2 < 0) {
            return [
                "nota" => null,
                "BMIrange" => "As notas devem conter valores positivos."
            ];
        }
    }

    public function verifyNegativeGradeWeight(int $peso1, int $peso2) {
        if($peso1 < 0 || $peso2 < 0) {
            return [
                "peso" => null,
                "BMIrange" => "O peso deve conter valores inteiros"
            ];
        }
    }

    public function calculateMedia(float $nota1, float $nota2, int $peso1, int $peso2) {
        $this -> validateData($nota1, $nota2, $peso1, $peso2);

        $media = round(($peso1 * $nota1) + ($peso2 * $nota2)/($peso1 + $peso2) );

        return [
            "media" => $media,
            "BMIrange" => $this->classifyMEDIA($media)
        ];
    }

    public function classifyMEDIA(float $media): string {
        return match (true) {
            $media < 6.0 => "Entrou na recuperação",
            $media >= 7.0 => "Passado",
            $media === 10 => "Passado com nota máxima"
        };
    }

    public function validateDATA(float $nota1, float $nota2, int $peso1, int $peso2) {
        $negativeValidation = $this->verifyNegativeNotes($nota1, $nota2);
        if ($negativeValidation !== null) {
            return $negativeValidation;
        }
        $negativeValidation = $this->verifyNegativeGradeWeight($peso1, $peso2);
        if($negativeValidation !== null) {
            return  $negativeValidation;
        }
        return null;
    }
}