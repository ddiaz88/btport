<?php

namespace App\Entity;

use App\Repository\DjsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DjsRepository::class)
 */
class Djs
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
     * @ORM\Column(type="date")
     */
    private $Fechan;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Generos;

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

    public function getFechan(): ?\DateTimeInterface
    {
        return $this->Fechan;
    }

    public function setFechan(\DateTimeInterface $Fechan): self
    {
        $this->Fechan = $Fechan;

        return $this;
    }

    public function getGeneros(): ?string
    {
        return $this->Generos;
    }

    public function setGeneros(string $Generos): self
    {
        $this->Generos = $Generos;

        return $this;
    }
}
