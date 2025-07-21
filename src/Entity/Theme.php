<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ThemeRepository::class)]
class Theme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    /**
     * @var Collection<int, SousTheme>
     */
    #[ORM\OneToMany(targetEntity: SousTheme::class, mappedBy: 'Theme')]
    private Collection $sousThemes;

    public function __construct()
    {
        $this->sousThemes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, SousTheme>
     */
    public function getSousThemes(): Collection
    {
        return $this->sousThemes;
    }

    public function addSousTheme(SousTheme $sousTheme): static
    {
        if (!$this->sousThemes->contains($sousTheme)) {
            $this->sousThemes->add($sousTheme);
            $sousTheme->setTheme($this);
        }

        return $this;
    }

    public function removeSousTheme(SousTheme $sousTheme): static
    {
        if ($this->sousThemes->removeElement($sousTheme)) {
            // set the owning side to null (unless already changed)
            if ($sousTheme->getTheme() === $this) {
                $sousTheme->setTheme(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }
}
