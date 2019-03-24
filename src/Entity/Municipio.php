<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

/**
 * Municipios
 *
 * @ORM\Table(name="municipios", indexes={@ORM\Index(name="municipios_provincias_id_provincia_fk", columns={"id_provincia"})})
 * @ORM\Entity
 */
class Municipio
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_municipio", type="smallint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="cod_municipio", type="integer", nullable=false, options={"comment"="Código de muncipio DENTRO de la provincia, campo no único"})
     */
    private $codMunicipio;

    /**
     * @var int
     *
     * @ORM\Column(name="DC", type="integer", nullable=false, options={"comment"="Digito Control. El INE no revela cómo se calcula, secreto nuclear."})
     */
    private $dc;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     * @Groups({"detail"})
     */
    private $nombre = '';

    /**
     * @var Provincia
     *
     * @ORM\ManyToOne(targetEntity="Provincia", inversedBy="municipios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_provincia", referencedColumnName="id_provincia")
     * })
     */
    private $provincia;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Municipio
     */
    public function setId(int $id): Municipio
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getCodMunicipio(): int
    {
        return $this->codMunicipio;
    }

    /**
     * @param int $codMunicipio
     * @return Municipio
     */
    public function setCodMunicipio(int $codMunicipio): Municipio
    {
        $this->codMunicipio = $codMunicipio;
        return $this;
    }

    /**
     * @return int
     */
    public function getDc(): int
    {
        return $this->dc;
    }

    /**
     * @param int $dc
     * @return Municipio
     */
    public function setDc(int $dc): Municipio
    {
        $this->dc = $dc;
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
     * @return Municipio
     */
    public function setNombre(string $nombre): Municipio
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return Provincia
     */
    public function getProvincia(): Provincia
    {
        return $this->provincia;
    }

    /**
     * @param Provincia $provincia
     * @return Municipio
     */
    public function setProvincia(Provincia $provincia): Municipio
    {
        $this->provincia = $provincia;
        return $this;
    }
}
