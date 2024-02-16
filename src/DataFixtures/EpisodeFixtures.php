<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $episodes = [
            ['title' => 'Episode 1', 'seasonReference' => 'season_1'],
            ['title' => 'Episode 2', 'seasonReference' => 'season_1'],
            ['title' => 'Episode 3', 'seasonReference' => 'season_2'],
        ];

        foreach ($episodes as $episodeData) {
            $episode = new Episode();
            $episode->setTitle($episodeData['title']);
            $episode->setSeason($this->getReference($episodeData['seasonReference']));
            $manager->persist($episode);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SeasonFixtures::class,
        ];
    }
}
