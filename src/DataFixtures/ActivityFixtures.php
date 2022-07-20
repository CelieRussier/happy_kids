<?php

namespace App\DataFixtures;

use App\Entity\Activity;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActivityFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 20; $i++) {
        $activity = new Activity();
        $name = $faker->randomElement([
            'Accrobranche',
            'Bébé nageur',
            'Ferme pédagogique',
            'Parc',
            'Peinture',
            'Balade',
            'Atelier langue des signes',
            'Zoo',
        ]);
        $activity->setName($name);
        $activity->setCity($faker->city());

        $picture = $faker->randomElement(
            [
                'bebe-nageur.jpeg',
                'ferme-pédagogique-charly-lyon.jpeg',
                'trampoline-dunkerque.jpg',
                'zoo.jpeg',
                'atelier-peinture.jpeg'
            ]
        );
        $activity->setPicture($picture);

        $activity->setDescription($faker->paragraphs(1, true));

        $this->addReference('activity_' . $i, $activity);

        $manager->persist($activity);
        }

        $manager->flush();
    }
}
