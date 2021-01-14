<?php

namespace App\Entity;

use App\Repository\HardTechyesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HardTechyesRepository::class)
 */
class HardTechyes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Nombre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Autor;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Productora;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Djs;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): self
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getAutor(): ?string
    {
        return $this->Autor;
    }

    public function setAutor(string $Autor): self
    {
        $this->Autor = $Autor;

        return $this;
    }

    public function getProductora(): ?string
    {
        return $this->Productora;
    }

    public function setProductora(?string $Productora): self
    {
        $this->Productora = $Productora;

        return $this;
    }

    public function getDjs(): ?string
    {
        return $this->Djs;
    }

    public function setDjs(string $Djs): self
    {
        $this->Djs = $Djs;

        return $this;
    }
}
