<?php

namespace App\Controller;

use App\Entity\Posts;
use App\Form\PostType;
use App\Repository\PostsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PostsController extends AbstractController
{
    #[Route('/posts', name: 'app_posts')]
    public function index(PostsRepository $postsRepository): Response
    {
        return $this->render('posts/index.html.twig', [
            'posts' => $postsRepository->findAll(),
        ]);
    }

    #[Route('/posts/{id<\d+>}', name: 'app_posts_show')]
    public function show($id, PostsRepository $postsRepository): Response
    {
        if ($postsRepository === null){
            throw $this->createNotFoundException('Post not found.');
        }

        return $this->render('posts/show.html.twig', [
            'post' => $postsRepository->find($id),
        ]);
    }

    #[Route('/posts/new', name: 'app_posts_new')]
    public function new(PostsRepository $postsRepository, PostType $postType)
    {
        return $this->render('posts/new.html.twig', [
            'form' => $this->createForm(PostType::class)
        ]);
    }
}

