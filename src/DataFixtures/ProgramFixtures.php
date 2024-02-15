<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $programs = [
            ["title" => "The Walking Dead", "synopsis" => "Des zombies envahissent la terre", "categoryReference" => "category_Action"],
            ["title" => "Game of Thrones", "synopsis" => "Une lutte impitoyable pour le trône de fer entre plusieurs familles nobles dans un monde fantastique.", "categoryReference" => "category_Fantastique"],
            ["title" => "Breaking Bad", "synopsis" => "Un professeur de chimie diagnostiqué avec un cancer se tourne vers la fabrication de méthamphétamine pour assurer l'avenir financier de sa famille.", "categoryReference" => "category_Drame"],
            ["title" => "Stranger Things", "synopsis" => "Des événements étranges se produisent dans une petite ville américaine alors qu'un groupe d'enfants se retrouve confronté à des phénomènes surnaturels.", "categoryReference" => "category_Science-fiction"],
            ["title" => "Friends", "synopsis" => "Les aventures hilarantes et émotionnelles d'un groupe d'amis vivant à New York.", "categoryReference" => "category_Comédie"],
            ["title" => "Black Mirror", "synopsis" => "Des histoires indépendantes explorant les implications sombres et dystopiques de la technologie moderne sur la société.", "categoryReference" => "category_Science-fiction"],
            ["title" => "The Office (US)", "synopsis" => "La vie quotidienne dans un bureau américain comique, mettant en vedette des personnages mémorables et des situations hilarantes.", "categoryReference" => "category_Comédie"],
            ["title" => "The Mandalorian", "synopsis" => "Les voyages d'un chasseur de primes solitaire dans les recoins les plus éloignés de la galaxie, loin de l'autorité de la Nouvelle République.", "categoryReference" => "category_Science-fiction"],
            ["title" => "The Crown", "synopsis" => "Les rivalités politiques et les romances de la reine Elizabeth II et les événements qui ont façonné la seconde moitié du XXe siècle.", "categoryReference" => "category_Drame"],
            ["title" => "The Haunting of Hill House", "synopsis" => "Des frères et sœurs qui, enfants, ont grandi dans ce qui est devenu la maison hantée la plus célèbre du pays.", "categoryReference" => "category_Horreur"],
        ];

        foreach ($programs as $programData) {
            $program = new Program();
            $program->setTitle($programData['title']);
            $program->setSynopsis($programData['synopsis']);
            $program->setCategory($this->getReference($programData['categoryReference']));
            $manager->persist($program);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
