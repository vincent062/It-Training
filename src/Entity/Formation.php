<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Type;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $id_formation = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $duree = null;

    #[ORM\Column]
    private ?int $prix = null;

    #[ORM\ManyToOne(targetEntity: SousTheme::class)]
    private ?SousTheme $sousthemeParent = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFormation(): ?string
    {
        return $this->id_formation;
    }

    public function setIdFormation(string $id_formation): static
    {
        $this->id_formation = $id_formation;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDuree(): ?\DateTime
    {
        return $this->duree;
    }

    public function setDuree(int $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getSousthemeParent(): ?string
    {
        return $this->sousthemeParent;
    }

    public function setSousthemeParent(?SousTheme $sousthemeParent): static
    {
        $this->sousthemeParent = $sousthemeParent;

        return $this;
    }
}
