<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comunidades
 *
 * @ORM\Table(name="comunidades")
 * @ORM\Entity
 */
class Comunidad
{
    /**
     * @var bool
     *
     * @ORM\Column(name="id_comunidad", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Comunidad
     */
    public function setId(int $id): Comunidad
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Comunidad
     */
    public function setNombre(string $nombre): Comunidad
    {
        $this->nombre = $nombre;
        return $this;
    }
}
