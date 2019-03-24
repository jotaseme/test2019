<?php

namespace App\Services;

use App\Repository\MunicipioRepository;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

class MunicipiosService implements MunicipiosServiceInterface
{
    /** @var  LoggerInterface */
    private $logger;

    /** @var  MunicipioRepository */
    private $municipioRepository;

    /**
     * MunicipiosService constructor.
     * @param LoggerInterface $logger
     * @param MunicipioRepository $municipioRepository
     */
    public function __construct(LoggerInterface $logger, MunicipioRepository $municipioRepository)
    {
        $this->logger = $logger;
        $this->municipioRepository = $municipioRepository;
    }

    /**
     * @param string $nombreDeProvincia
     * @return array
     */
    public function getAllByNombreDeProvincia(string $nombreDeProvincia): array
    {
        $this->logger->log(Logger::ERROR, 'getAllByNombreDeProvincia');
        return $this->municipioRepository->getAllByNombreDeProvincia($nombreDeProvincia);
    }
}