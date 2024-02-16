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
            ['title' => 'Days Gone Bye', 'synopsis' => 'Rick Grimes se réveille d\'un coma pour découvrir un monde envahi par les morts-vivants. Il part à la recherche de sa famille et découvre les horreurs du monde post-apocalyptique.', 'seasonReference' => 'season_TWD_1'],
            ['title' => 'Guts', 'synopsis' => 'Le groupe de survivants dirigé par Rick fait face à des défis alors qu\'ils tentent de trouver un refuge. Les tensions montent et les relations sont mises à l\'épreuve face aux dangers constants.', 'seasonReference' => 'season_TWD_1'],
            ['title' => 'Tell It to the Frogs', 'synopsis' => 'Le groupe rencontre de nouvelles menaces et a du mal à s\'adapter à la réalité impitoyable d\'un monde infesté de zombies. La confiance est difficile à trouver alors qu\'ils luttent pour leur survie.', 'seasonReference' => 'season_TWD_2'],
            
            ['title' => 'Winter Is Coming', 'synopsis' => 'Synopsis pour Winter Is Coming de Game of Thrones', 'seasonReference' => 'season_GoT_1'],
            ['title' => 'The Kingsroad', 'synopsis' => 'Synopsis pour The Kingsroad de Game of Thrones', 'seasonReference' => 'season_GoT_1'],
            ['title' => 'The North Remembers', 'synopsis' => 'Synopsis pour The North Remembers de Game of Thrones', 'seasonReference' => 'season_GoT_2'],
            ['title' => 'The Night Lands', 'synopsis' => 'Synopsis pour The Night Lands de Game of Thrones', 'seasonReference' => 'season_GoT_2'],
            ['title' => 'The Rains of Castamere', 'synopsis' => 'Synopsis pour The Rains of Castamere de Game of Thrones', 'seasonReference' => 'season_GoT_3'],
        ];
        

        foreach ($episodes as $episodeData) {
            $episode = new Episode();
            $episode->setTitle($episodeData['title']);
            $episode->setSynopsis($episodeData['synopsis']);
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