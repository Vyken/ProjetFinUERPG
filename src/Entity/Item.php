<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;

#[ApiResource()]

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $effect = null;

    #[ORM\ManyToMany(targetEntity: Personnage::class, inversedBy: 'items')]
    private Collection $inventaire;

    public function __construct()
    {
        $this->inventaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEffect(): ?string
    {
        return $this->effect;
    }

    public function setEffect(string $effect): self
    {
        $this->effect = $effect;

        return $this;
    }

    /**
     * @return Collection<int, Personnage>
     */
    public function getInventaire(): Collection
    {
        return $this->inventaire;
    }

    public function addInventaire(Personnage $inventaire): self
    {
        if (!$this->inventaire->contains($inventaire)) {
            $this->inventaire->add($inventaire);
        }

        return $this;
    }

    public function removeInventaire(Personnage $inventaire): self
    {
        $this->inventaire->removeElement($inventaire);

        return $this;
    }
}
