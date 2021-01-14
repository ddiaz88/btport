<?php

namespace App\Entity;

use App\Repository\NombreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NombreRepository::class)
 */
class Nombre
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
    private $idcancion;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $album;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $autor;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $genero;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdcancion(): ?string
    {
        return $this->idcancion;
    }

    public function setIdcancion(string $idcancion): self
    {
        $this->idcancion = $idcancion;

        return $this;
    }

    public function getAlbum(): ?string
    {
        return $this->album;
    }

    public function setAlbum(string $album): self
    {
        $this->album = $album;

        return $this;
    }

    public function getAutor(): ?string
    {
        return $this->autor;
    }

    public function setAutor(string $autor): self
    {
        $this->autor = $autor;

        return $this;
    }

    public function getGenero(): ?string
    {
        return $this->genero;
    }

    public function setGenero(string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }
}
