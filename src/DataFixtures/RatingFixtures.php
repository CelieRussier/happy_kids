<?php

namespace App\DataFixtures;

use App\Entity\Rating;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class RatingFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        {
            $faker = Factory::create('fr_FR');
    
            for ($i = 0; $i < 500; $i++) {
            $rating = new Rating();
            $age = $faker->randomElement([
                '0-3ans',
                '3-6ans',
                '6-12ans',
                '12-99ans',
            ]);
            $rating->setAge($age);
            $rating->setRate($faker->numberBetween(0, 5));
            $rating->setActivity($this->getReference('activity_' . $faker->numberBetween(0, 19)));
    
            $manager->persist($rating);
            }
    
            $manager->flush();
        }
    }

    public function getDependencies(): array
    {
        return
            [
                ActivityFixtures::class
            ];
    }
}
