<?php

namespace App\Entity;

use App\Repository\LigneCommandeFilmRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LigneCommandeFilmRepository::class)
 */
class LigneCommandeFilm
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\ManyToOne(targetEntity=Commande::class, inversedBy="ligneCommandeFilms",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $uneCommande;

    /**
     * @ORM\ManyToOne(targetEntity=Film::class, inversedBy="ligneCommandeFilms",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $unFilm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getUneCommande(): ?Commande
    {
        return $this->uneCommande;
    }

    public function setUneCommande(?Commande $uneCommande): self
    {
        $this->uneCommande = $uneCommande;

        return $this;
    }

    public function getUnFilm(): ?Film
    {
        return $this->unFilm;
    }

    public function setUnFilm(?Film $unFilm): self
    {
        $this->unFilm = $unFilm;

        return $this;
    }
}
