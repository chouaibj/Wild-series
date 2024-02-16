<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $seasons = [
            ['title' => 'Saison 1', 'reference' => '1', 'programReference' => 'program_1'],
            ['title' => 'Saison 2', 'reference' => '2', 'programReference' => 'program_1'],
            ['title' => 'Saison 3', 'reference' => '3', 'programReference' => 'program_1'],
        ];
        foreach ($seasons as $seasonData) {
            $season = new season();
            $season->setTitle($seasonData['title']);
            $season->setProgram($this->getReference($seasonData['programReference']));
            $manager->persist($season);
            $this->addReference('season_' . $seasonData['reference'], $season);

        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProgramFixtures::class,
        ];
    }
}
