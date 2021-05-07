<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FilmRepository::class)
 */
class Film
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nomFilm;

    /**
     * @ORM\Column(type="date")
     */
    private $dateSortie;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $realisateurFilm;

    /**
     * @ORM\Column(type="time")
     */
    private $dureeFilm;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nationaliteFilm;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $genreFilm;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $synopsisFilm;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $noteFilm;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $imgFilm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFilm(): ?string
    {
        return $this->nomFilm;
    }

    public function setNomFilm(string $nomFilm): self
    {
        $this->nomFilm = $nomFilm;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->dateSortie;
    }

    public function setDateSortie(\DateTimeInterface $dateSortie): self
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    public function getRealisateurFilm(): ?string
    {
        return $this->realisateurFilm;
    }

    public function setRealisateurFilm(string $realisateurFilm): self
    {
        $this->realisateurFilm = $realisateurFilm;

        return $this;
    }

    public function getDureeFilm(): ?\DateTimeInterface
    {
        return $this->dureeFilm;
    }

    public function setDureeFilm(\DateTimeInterface $dureeFilm): self
    {
        $this->dureeFilm = $dureeFilm;

        return $this;
    }

    public function getNationaliteFilm(): ?string
    {
        return $this->nationaliteFilm;
    }

    public function setNationaliteFilm(string $nationaliteFilm): self
    {
        $this->nationaliteFilm = $nationaliteFilm;

        return $this;
    }

    public function getGenreFilm(): ?string
    {
        return $this->genreFilm;
    }

    public function setGenreFilm(string $genreFilm): self
    {
        $this->genreFilm = $genreFilm;

        return $this;
    }

    public function getSynopsisFilm(): ?string
    {
        return $this->synopsisFilm;
    }

    public function setSynopsisFilm(string $synopsisFilm): self
    {
        $this->synopsisFilm = $synopsisFilm;

        return $this;
    }

    public function getNoteFilm(): ?string
    {
        return $this->noteFilm;
    }

    public function setNoteFilm(string $noteFilm): self
    {
        $this->noteFilm = $noteFilm;

        return $this;
    }

    public function getImgFilm(): ?string
    {
        return $this->imgFilm;
    }

    public function setImgFilm(string $imgFilm): self
    {
        $this->imgFilm = $imgFilm;

        return $this;
    }
}
