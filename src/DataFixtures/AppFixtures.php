<?php

namespace App\DataFixtures;

use App\Entity\Ennemi;
use App\Entity\Item;
use App\Entity\Personnage;
use App\Entity\Spell;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordEncoder){
        $this->passwordEncoder = $passwordEncoder;
    }

    //La plupart de mes fixtures sont faites à la main, sans utilisation de faker car le fait que ça soit un scénario scripté ne doit pas contenir d'aléatoire. 
    //Cependant cela peut être une piste d'amélioration
    public function load(ObjectManager $manager): void
    {
        $password = 'password';
        $user = new User();
        $user->setEmail('user@mail.fr')->setPassword($this->passwordEncoder->hashPassword($user, $password));
        $manager->persist($user);

        $admin = new User();
        $admin->setEmail('admin@mail.fr')->setPassword($this->passwordEncoder->hashPassword($admin, $password))->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        $persoUser = new Personnage();
        $persoUser->setName('Newt')->setUser($user);
        $manager->persist($persoUser);

        $persoAdmin = new Personnage();
        $persoAdmin->setName('Ritz')->setUser($admin);
        $manager->persist($persoAdmin);

        $gobelin = new Ennemi();
        $gobelin->setName('Gobelin')->setAtk(8)->setHealth(28)->setMana(1);
        $manager->persist($gobelin);

        $mageNoir = new Ennemi();
        $mageNoir->setName('Mage Noir')->setAtk(15)->setHealth(70)->setMana(40);
        $manager->persist($mageNoir);

        $ombre = new Ennemi();
        $ombre->setName('Ombre')->setAtk(18)->setHealth(100)->setMana(60);
        $manager->persist($ombre);

        $feu = new Spell();
        $feu->setName('Boule de feu')->setCost(20)->setEffect('Envoie une boule de feu sur l ennemi qui inflige 25pts de dégats');
        $manager->persist($feu);

        $heal = new Spell();
        $heal->setName('Soin')->setCost(15)->setEffect('Soigne de 30 pv');
        $manager->persist($heal);

        $scan = new Spell();
        $scan->setName('Detection')->setCost(20)->setEffect('Donne le nombre de pv restant de l ennemi');
        $manager->persist($scan);

        $potionmana = new Item();
        $potionmana->setName('Potion de mana')->setEffect('Rend 30 pts de mana');
        $manager->persist($potionmana);


        $manager->flush();
    }
}
