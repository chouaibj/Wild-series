<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Program;
use App\Repository\CategoryRepository;
use App\Repository\ProgramRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/program', name: 'program_')]
class ProgramController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $programs = $programRepository->findAll();
        return $this->render('Program/index.html.twig', [
            'title' => 'Wild Series',
            'programs' => $programs,
        ]);
    }

    #[Route('/{id}', name: 'show', requirements: ['id' => '\d+'])]
    public function show($id, ProgramRepository $programRepository): Response
    {
        $program = $programRepository->findOneBy(['id' => $id]);
    
        if (!$program) {
            throw $this->createNotFoundException('Program not found');
        }
    
        return $this->render('Program/show.html.twig', [
            'program' => $program,
        ]);
    }    

}
