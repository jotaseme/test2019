<?php

namespace App\Services;

use App\Entity\Municipio;

interface PrediccionClimatologicaServiceInterface
{
    /**
     * @param Municipio $municipio
     * @return mixed
     */
    public function getPrevisionPorMunicipio(Municipio $municipio);
}