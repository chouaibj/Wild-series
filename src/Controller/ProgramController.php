<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\ProgramRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/Program', name: 'program_')]
class ProgramController extends AbstractController
{
    #[Route('/{id}/', name: 'show', requirements: ['id' => '\d+'])]
    public function show($id): Response
    {
        
    $program = $programRepository->findOneBy(['id' => $id]);
        if (!is_numeric($id) || intval($id) != $id) {
            throw $this->createNotFoundException('Page non trouvée');
        }

        return $this->render('Program/show.html.twig', [
            'title' => "Program $id",
        ]);
    }

    #[Route('/', name: 'index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $programs = $programRepository->findAll();
        return $this->render('Program/index.html.twig', [
            'title' => 'Wild Series',
            'programs' => $programs,
        ]);
    }

}
