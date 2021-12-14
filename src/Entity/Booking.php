<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookingRepository::class)
 */
class Booking
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity=DetailVoiture::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $voiture;

    /**
     * @ORM\Column(type="date")
     */
    private $StartDate;

    /**
     * @ORM\Column(type="date")
     */
    private $EndDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $NombreDeJours;

    /**
     * @ORM\Column(type="integer")
     */
    private $Prix;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="bookings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getVoiture(): ?DetailVoiture
    {
        return $this->voiture;
    }

    public function setVoiture(?DetailVoiture $voiture): self
    {
        $this->voiture = $voiture;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->StartDate;
    }

    public function setStartDate(\DateTimeInterface $StartDate): self
    {
        $this->StartDate = $StartDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->EndDate;
    }

    public function setEndDate(\DateTimeInterface $EndDate): self
    {
        $this->EndDate = $EndDate;

        return $this;
    }

    public function getNombreDeJours(): ?int
    {
        return $this->NombreDeJours;
    }

    public function setNombreDeJours(int $NombreDeJours): self
    {
        $this->NombreDeJours = $NombreDeJours;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->Prix;
    }

    public function setPrix(int $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
