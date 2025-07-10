<?php

namespace App\Entity;

use App\Repository\SousThemeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SousThemeRepository::class)]
class SousTheme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ID_soustheme = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $id_theme_parent = null;

    #[ORM\ManyToOne(inversedBy: 'sousThemes')]
    private ?Theme $Theme = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDSoustheme(): ?string
    {
        return $this->ID_soustheme;
    }

    public function setIDSoustheme(string $ID_soustheme): static
    {
        $this->ID_soustheme = $ID_soustheme;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getIdThemeParent(): ?string
    {
        return $this->id_theme_parent;
    }

    public function setIdThemeParent(string $id_theme_parent): static
    {
        $this->id_theme_parent = $id_theme_parent;

        return $this;
    }

    public function getTheme(): ?Theme
    {
        return $this->Theme;
    }

    public function setTheme(?Theme $Theme): static
    {
        $this->Theme = $Theme;

        return $this;
    }
}
