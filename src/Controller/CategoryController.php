<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    #[Route('/categories', name: 'app_categories')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('categories/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }

    #[Route('/categories/{id}', name: 'app_category_show')]
    public function show($id, CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->find($id);

        return $this->render('categories/show.html.twig', [
            'category' => $category,
        ]);
    }
}
