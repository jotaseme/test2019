<?php

namespace App\Repository;

use App\Entity\Provincia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ProvinciaRepository extends ServiceEntityRepository
{
    /**
     * ProvinciaRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Provincia::class);
    }

    /**
     * @param $nombreDeComunidad
     * @return array
     */
    public function getAllByNombreDeComunidad($nombreDeComunidad): array
    {
        $qb = $this->createQueryBuilder('p')
            ->join('p.comunidad', 'c')
            ->where('c.nombre = :nombreDeComunidad')
            ->setParameter('nombreDeComunidad', $nombreDeComunidad)
            ->getQuery();

        return $qb->getResult();
    }
}