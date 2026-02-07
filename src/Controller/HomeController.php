<?php

namespace App\Controller;

use App\Repository\PostsRepository;
use App\Repository\ProjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PostsRepository $postsRepository, ProjectsRepository $projectsRepository): Response
    {
        $posts = $postsRepository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'posts' => $posts,
            'projects' => $projectsRepository->findAll()
        ]);
    }
}
