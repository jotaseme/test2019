<?php

namespace App\Services;

interface ProvinciasServiceInterface
{
    /**
     * @param string $nombreDeComunidad
     * @return array
     */
    public function getAllByNombreDeComunidad(string $nombreDeComunidad): array;
}