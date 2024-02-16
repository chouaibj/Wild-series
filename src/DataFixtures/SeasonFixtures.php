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
            ['number' => 1, 'year' => 2010, 'reference' => 'TWD_1', 'programReference' => 'program_The Walking Dead'],
            ['number' => 2, 'year' => 2011, 'reference' => 'TWD_2', 'programReference' => 'program_The Walking Dead'],
            ['number' => 3, 'year' => 2012, 'reference' => 'TWD_3', 'programReference' => 'program_The Walking Dead'],
            ['number' => 1, 'year' => 2011, 'reference' => 'GoT_1', 'programReference' => 'program_Game of Thrones'],
            ['number' => 2, 'year' => 2012, 'reference' => 'GoT_2', 'programReference' => 'program_Game of Thrones'],
            ['number' => 3, 'year' => 2013, 'reference' => 'GoT_3', 'programReference' => 'program_Game of Thrones'],
        ];        
        
        foreach ($seasons as $seasonData) {
            $season = new Season();
            $season->setNumber($seasonData['number']);
            $season->setYear($seasonData['year']);
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
