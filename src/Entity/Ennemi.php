<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Put;
use App\Repository\EnnemiRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(operations: [
    new Get(),
    new Put(),
    new Post(),
    new Delete(),
    new GetCollection(
        normalizationContext:['groups' => ['ennemi:read']],
        denormalizationContext:['groups' => ['ennemi:write']]),

])]

#[ORM\Entity(repositoryClass: EnnemiRepository::class)]
class Ennemi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['ennemi:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['ennemi:read'])]
    private ?string $name = null;

    #[ORM\Column]
    #[Groups(['ennemi:read'])]
    private ?int $health = null;

    #[ORM\Column]
    #[Groups(['ennemi:read'])]
    private ?int $mana = null;

    #[ORM\Column]
    #[Groups(['ennemi:read'])]
    private ?int $atk = null;


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
        return $this->health;
    }

    public function setHealth(int $health): self
    {
        $this->health = $health;

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
      public function attack(Personnage $joueur) 
    {
        $pvperdu = rand($this->atk-5,$this->atk+5);
       $joueur->setHealth($joueur->getHealth() - $pvperdu);
       echo( $this->name . " attaque ". $joueur->getName() . ". Il perd " . $pvperdu . " pv ") . PHP_EOL;
    }

    
}
