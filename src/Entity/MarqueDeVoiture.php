<?php

namespace App\Entity;

use App\Repository\MarqueDeVoitureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MarqueDeVoitureRepository::class)
 */
class MarqueDeVoiture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $creation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fondateurs;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $filiales;

    /**
     * @ORM\OneToMany(targetEntity=DetailVoiture::class, mappedBy="marque")
     */
    private $detailVoitures;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $images;

    public function __construct()
    {
        $this->detailVoitures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCreation(): ?string
    {
        return $this->creation;
    }

    public function setCreation(string $creation): self
    {
        $this->creation = $creation;

        return $this;
    }

    public function getFondateurs(): ?string
    {
        return $this->fondateurs;
    }

    public function setFondateurs(string $fondateurs): self
    {
        $this->fondateurs = $fondateurs;

        return $this;
    }

    public function getFiliales(): ?string
    {
        return $this->filiales;
    }

    public function setFiliales(string $filiales): self
    {
        $this->filiales = $filiales;

        return $this;
    }

    /**
     * @return Collection|DetailVoiture[]
     */
    public function getDetailVoitures(): Collection
    {
        return $this->detailVoitures;
    }

    public function addDetailVoiture(DetailVoiture $detailVoiture): self
    {
        if (!$this->detailVoitures->contains($detailVoiture)) {
            $this->detailVoitures[] = $detailVoiture;
            $detailVoiture->setMarque($this);
        }

        return $this;
    }

    public function removeDetailVoiture(DetailVoiture $detailVoiture): self
    {
        if ($this->detailVoitures->removeElement($detailVoiture)) {
            // set the owning side to null (unless already changed)
            if ($detailVoiture->getMarque() === $this) {
                $detailVoiture->setMarque(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }

    public function getImages(): ?string
    {
        return $this->images;
    }

    public function setImages(string $images): self
    {
        $this->images = $images;

        return $this;
    }
}
