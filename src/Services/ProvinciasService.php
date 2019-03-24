<?php

namespace App\Services;

use App\Repository\ProvinciaRepository;

class ProvinciasService implements ProvinciasServiceInterface
{
    /** @var ProvinciaRepository */
    private $provinciaRepository;

    /**
     * ProvinciasService constructor.
     * @param $provinciaRepository
     */
    public function __construct(ProvinciaRepository $provinciaRepository)
    {
        $this->provinciaRepository = $provinciaRepository;
    }

    /**
     * @param string $nombreDeComunidad
     * @return array
     */
    public function getAllByNombreDeComunidad(string $nombreDeComunidad): array
    {
        return $this->provinciaRepository->getAllByNombreDeComunidad($nombreDeComunidad);
    }
}