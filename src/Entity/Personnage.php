<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\PersonnageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnageRepository::class)]
#[ApiResource(operations: [
    new Get(),
    new GetCollection()
])]

class Personnage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $Health = null;

    #[ORM\Column]
    private ?int $mana = null;

    #[ORM\Column]
    private ?int $atk = null;

    #[ORM\ManyToOne(inversedBy: 'personnages')]
    private ?User $user = null;

    #[ORM\ManyToMany(targetEntity: Item::class, mappedBy: 'inventaire')]
    private Collection $items;

    public function __construct()
    {
        $this->Health = 100;
        $this->mana = 100;
        $this->atk = rand(10, 15);
        $this->items = new ArrayCollection();
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

    public function getHealth(): ?int
    {
        return $this->Health;
    }

    public function setHealth(int $Health): self
    {
        $this->Health = $Health;

        return $this;
    }

    public function getMana(): ?int
    {
        return $this->mana;
    }

    public function setMana(int $mana): self
    {
        $this->mana = $mana;

        return $this;
    }

    public function getAtk(): ?int
    {
        return $this->atk;
    }

    public function setAtk(int $atk): self
    {
        $this->atk = $atk;

        return $this;
    }

    public function attack(Ennemi $ennemi) 
    {
        $pvperdu = rand($this->atk-5,$this->atk+5);
       $ennemi->setHealth($ennemi->getHealth() - $pvperdu);
       echo( $this->name . " attaque ". $ennemi->getName() . ". Il perd " . $pvperdu . " pv ") . PHP_EOL;
    }

    public function spell(Spell $spell, Ennemi $ennemi) 
    {
        if ($this->getMana() >= $spell->getCost()) {
            $this->setMana($this->getMana() - $spell->getCost());
            switch ($spell->getName()){
                case "Boule de feu":
                    echo("vous lancez une boule de feu sur l'ennemi. Il perd 25 pv");
                    $ennemi->setHealth($ennemi->getHealth() - 25);
                    break;
                case "Soin":
                    $this->setHealth($this->getHealth() + 30);
                    echo("vous sentez une aura revivifiante autour de vous. vous regagnez 30 pv");
                    break;
                case "Detection":
                    echo("l'ennemi possède ". $ennemi->getHealth(). " pv ") . PHP_EOL;
                    break;
            };
        } else{
            echo "vous n'avez pas assez de mana.";
        };
    }

    public function UseItem(Item $item) 
    {
        if ($this->items->contains($item)) {
            $this->items->removeElement($item);
            switch ($item->getName()){
                case "Potion de mana":
                    echo("Vous buvez une potion de mana et récupérez 30 pts");
                    $this->setMana($this->getMana() + 30);
                    break;
            };
        } else{
            echo "vous n'avez pas de potion de mana dans votre inventaire.";
        };
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

    /**
     * @return Collection<int, Item>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items->add($item);
            $item->addInventaire($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->items->removeElement($item)) {
            $item->removeInventaire($this);
        }

        return $this;
    }

}
