<?php

namespace App\Controller;

// use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/Program', name: 'program_')]
class ProgramController extends AbstractController
{
    #[Route('/{id}/', name: 'show', requirements: ['id' => '\d+'])]
    public function show($id): Response
    {
        if (!is_numeric($id) || intval($id) != $id) {
            throw $this->createNotFoundException('Page non trouvée');
        }

        return $this->render('program/show.html.twig', [
            'title' => "Program $id",
        ]);
    }

    // #[Route('/', name: 'index')]
    // public function index(PaginatorInterface $paginator, Request $request): Response
    // {
    //     // Récupérez vos données depuis la base de données
    //     $query = /* Votre requête ou méthode pour récupérer les données */;

    //     // Paginer les résultats
    //     $pagination = $paginator->paginate(
    //         $query,
    //         $request->query->getInt('page', 1),
    //         10
    //     );

    //     return $this->render('Program/index.html.twig', [
    //         'title' => 'Wild Series',
    //         'pagination' => $pagination,
    //     ]);
    // }

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('Program/index.html.twig', [
            'title' => 'Wild Series',
        ]);
    }

    #[Route('/Action', name: 'action')]
    public function action(): Response
    {
        return $this->render('Program/index.html.twig', [
            'title' => 'Series Action',
        ]);
    }

    #[Route('/Animation', name: 'animation')]
    public function animation(): Response
    {
        return $this->render('Program/index.html.twig', [
            'title' => 'Series Animation',
        ]);
    }

    #[Route('/Adventure', name: 'adventure')]
    public function adventure(): Response
    {
        return $this->render('Program/index.html.twig', [
            'title' => 'Series Adventure',
        ]);
    }
}
