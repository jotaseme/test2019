<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Provincias
 *
 * @ORM\Table(name="provincias", indexes={@ORM\Index(name="provincias_comunidades_id_comunidad_fk", columns={"id_comunidad"})})
 * @ORM\Entity
 */
class Provincia
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_provincia", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="provincia", type="string", length=30, nullable=true)
     */
    private $provincia;

    /**
     * @var Comunidad
     *
     * @ORM\ManyToOne(targetEntity="Comunidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_comunidad", referencedColumnName="id_comunidad")
     * })
     */
    private $comunidad;

    /**
     * @ORM\OneToMany(targetEntity="Municipio", mappedBy="provincia")
     */
    private $municipios;

    public function __construct()
    {
        $this->municipios = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Provincia
     */
    public function setId(int $id): Provincia
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @param null|string $provincia
     * @return Provincia
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
        return $this;
    }

    /**
     * @return Comunidad
     */
    public function getComunidad(): Comunidad
    {
        return $this->comunidad;
    }

    /**
     * @param Comunidad $comunidad
     * @return Provincia
     */
    public function setComunidad(Comunidad $comunidad): Provincia
    {
        $this->comunidad = $comunidad;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMunicipios()
    {
        return $this->municipios;
    }
}
