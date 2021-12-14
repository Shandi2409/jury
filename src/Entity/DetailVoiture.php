<?php

namespace App\Entity;

use App\Repository\DetailVoitureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DetailVoitureRepository::class)
 */
class DetailVoiture
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
    private $couleur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modeles;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre_portes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_carburant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $boite_vitesse;

    /**
     * @ORM\ManyToOne(targetEntity=MarqueDeVoiture::class, inversedBy="detailVoitures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $images;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prix;


    public function __construct()
    {
        $this->formulaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getModeles(): ?string
    {
        return $this->modeles;
    }

    public function setModeles(string $modeles): self
    {
        $this->modeles = $modeles;

        return $this;
    }

    public function getNombrePortes(): ?string
    {
        return $this->nombre_portes;
    }

    public function setNombrePortes(string $nombre_portes): self
    {
        $this->nombre_portes = $nombre_portes;

        return $this;
    }

    public function getTypeCarburant(): ?string
    {
        return $this->type_carburant;
    }

    public function setTypeCarburant(string $type_carburant): self
    {
        $this->type_carburant = $type_carburant;

        return $this;
    }

    public function getBoiteVitesse(): ?string
    {
        return $this->boite_vitesse;
    }

    public function setBoiteVitesse(string $boite_vitesse): self
    {
        $this->boite_vitesse = $boite_vitesse;

        return $this;
    }

    public function getMarque(): ?MarqueDeVoiture
    {
        return $this->marque;
    }

    public function setMarque(?MarqueDeVoiture $marque): self
    {
        $this->marque = $marque;

        return $this;
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

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(?int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function __toString()
    {
        return $this->modeles;
    }

}
