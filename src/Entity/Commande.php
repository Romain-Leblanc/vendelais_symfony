<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class,cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $unUtilisateur;

    /**
     * @ORM\OneToMany(targetEntity=LigneCommandeFilm::class, mappedBy="uneCommande",cascade={"persist"})
     */
    private $ligneCommandeFilms;

    public function __construct()
    {
        $this->ligneCommandeFilms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUnUtilisateur(): ?Utilisateur
    {
        return $this->unUtilisateur;
    }

    public function setUnUtilisateur(?Utilisateur $unUtilisateur): self
    {
        $this->unUtilisateur = $unUtilisateur;

        return $this;
    }

    /**
     * @return Collection|LigneCommandeFilm[]
     */
    public function getLigneCommandeFilms(): Collection
    {
        return $this->ligneCommandeFilms;
    }

    public function addLigneCommandeFilm(LigneCommandeFilm $ligneCommandeFilm): self
    {
        if (!$this->ligneCommandeFilms->contains($ligneCommandeFilm)) {
            $this->ligneCommandeFilms[] = $ligneCommandeFilm;
            $ligneCommandeFilm->setUneCommande($this);
        }

        return $this;
    }

    public function removeLigneCommandeFilm(LigneCommandeFilm $ligneCommandeFilm): self
    {
        if ($this->ligneCommandeFilms->contains($ligneCommandeFilm)) {
            $this->ligneCommandeFilms->removeElement($ligneCommandeFilm);
            // set the owning side to null (unless already changed)
            if ($ligneCommandeFilm->getUneCommande() === $this) {
            $ligneCommandeFilm->setUneCommande(null);
            }
            }

        return $this;
    }
}
