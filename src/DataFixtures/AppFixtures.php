<?php

namespace App\DataFixtures;

use App\Entity\Sortie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = \Faker\Factory::create('fr_Fr');
        for ($i=0; $i<=10; $i++) {
            $sortie = new Sortie();
            $sortie->setNom($faker->name);
            $sortie->setDateDebut($faker->date($format = 'd-m-Y', $max = 'now'));
            $sortie->setDuree($faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now'));
            $sortie->setDateCloture($faker->dateTimeInInterval($startDate = '-2 years', $interval = '+ 5 days'));
            $sortie->setNbInscriptionsMax($faker->randomDigit);
            $sortie->setCommentaires($faker->realText($maxNbChars = 200, $indexSize = 2));
            $sortie->setEtat($faker->word);
            $sortie->setInscrivants($faker->name);
            $sortie->setCampus($faker->city);
            $sortie->setOrganisateur($faker->name);

        }


        $manager->flush();
    }
}
