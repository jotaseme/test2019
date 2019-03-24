<?php

namespace App\Services;

interface MunicipiosServiceInterface
{
    /**
     * @param string $nombreDeProvincia
     * @return array
     */
    public function getAllByNombreDeProvincia(string $nombreDeProvincia): array;
}