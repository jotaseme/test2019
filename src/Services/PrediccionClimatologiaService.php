<?php

namespace App\Services;

use App\Entity\Municipio;
use Jotaeme\AemetBundle\Aemet\APIClient;
use Jotaeme\AemetBundle\Model\PrevisionesEspecificas;

class PrediccionClimatologiaService implements PrediccionClimatologicaServiceInterface
{
    /** @var  APIClient */
    private $aemetAPIClient;

    /**
     * PrediccionClimatologiaService constructor.
     * @param APIClient $aemetAPIClient
     */
    public function __construct(APIClient $aemetAPIClient)
    {
        $this->aemetAPIClient = $aemetAPIClient;
    }

    /**
     * @param Municipio $municipio
     * @return PrevisionesEspecificas
     */
    public function getPrevisionPorMunicipio(Municipio $municipio): PrevisionesEspecificas
    {
        $codigo = $municipio->getProvincia()->getId() . str_pad($municipio->getCodMunicipio(), 3, "0", STR_PAD_LEFT);
        return $this->aemetAPIClient->getPrevisionSemanal($codigo);
    }
}