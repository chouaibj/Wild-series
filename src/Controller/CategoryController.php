<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Program;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/category', name: 'category_')]
class CategoryController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $categories = $this->entityManager->getRepository(Category::class)->findAll();
    
        return $this->render('Category/index.html.twig', [
            'categories' => $categories,
        ]);
    } 

    #[Route('/{categoryName}', name: 'show')]
    public function show(string $categoryName): Response
    {
        $category = $this->entityManager->getRepository(Category::class)->findOneBy(['name' => $categoryName]);

        if (!$category) {
            throw $this->createNotFoundException("Aucune catégorie nommée $categoryName");
        }

        $programs = $this->entityManager->getRepository(Program::class)->findBy(
            ['category' => $category],
            ['id' => 'DESC'],
            3
        );

        return $this->render('Category/show.html.twig', [
            'category' => $category,
            'programs' => $programs,
        ]);
    }
}
