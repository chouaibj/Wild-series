<?php

namespace App\Controller;

use App\Entity\Season;
use App\Repository\SeasonRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/season', name: 'season_')]
class SeasonController extends AbstractController
{
    #[Route('/{id}', name: 'show', requirements: ['id' => '\d+'])]
    public function show(Season $season, SeasonRepository $seasonRepository): Response
    {
        $program = $season->getProgram();
        $episodes = $season->getEpisodes();

        return $this->render('Season/show.html.twig', [
            'program' => $program,
            'season' => $season,
            'episodes' => $episodes,
        ]);
    }
}
