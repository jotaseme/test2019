<?php

namespace App\Repository;

use App\Entity\Municipio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class MunicipioRepository extends ServiceEntityRepository
{
    /**
     * MunicipioRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Municipio::class);
    }

    /**
     * @param string $nombreDeProvincia
     * @return array
     */
    public function getAllByNombreDeProvincia(string $nombreDeProvincia): array
    {
        $qb = $this->createQueryBuilder('m')
            ->join('m.provincia', 'p')
            ->where('p.provincia = :nombreDeProvincia')
            ->setParameter('nombreDeProvincia', $nombreDeProvincia)
            ->getQuery();

        return $qb->getResult();
    }

    /**
     * @param string $nombreDeMunicipio
     * @return Municipio|null
     */
    public function findByNombre(string $nombreDeMunicipio): Municipio
    {
        $qb = $this->createQueryBuilder('m')
            ->where('m.nombre = :$nombreDeMunicipio')
            ->setParameter('$nombreDeMunicipio', $nombreDeMunicipio)
            ->getQuery();

        return $qb->getOneOrNullResult();
    }
}