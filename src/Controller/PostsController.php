<?php

namespace App\Controller;

use App\Entity\Posts;
use App\Form\PostType;
use App\Repository\PostsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/posts/{slug}', name: 'app_posts_show')]
    public function show(PostsRepository $postsRepository, $slug): Response
    {
        if ($postsRepository === null){
            throw $this->createNotFoundException('Post not found.');
        }

        $post = $postsRepository->findOneBy(['slug' => $slug]);

        return $this->render('posts/show.html.twig', [
            'post' => $post,
        ]);
    }

    #[Route('/posts/new', name: 'app_posts_new')]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $post = new Posts;

        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($post);

            $manager->flush();

            $this->addFlash(
                'notice',
                'Post created successfully.'
            );

            return $this->redirectToRoute('app_posts_show', ['slug' => $post->getSlug()]);
        }

        return $this->render('posts/new.html.twig', [
            'form' => $form
        ]);
    }
}

