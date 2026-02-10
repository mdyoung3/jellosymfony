<?php

namespace App\Controller;

use App\Entity\Posts;
use App\Form\PostType;
use App\Repository\PostsRepository;
use App\Repository\ProjectsRepository;
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

    #[Route('/posts/new', name: 'app_posts_new')]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $post = new Posts;

        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($post->getCreatedAt() === null) {
                $post->setCreatedAt(new \DateTimeImmutable());
            }

            if ($post->getUpdatedAt() === null) {
                $post->setUpdatedAt(new \DateTimeImmutable());
            }

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

    #[Route('/posts/{slug}/edit', name: 'app_post_edit')]
    public function edit(PostsRepository $postsRepository, $slug, Request $request, EntityManagerInterface $manager)
    {
        $post = $postsRepository->findOneBy(['slug' => $slug]);

        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->flush();

            $this->addFlash(
                'notice',
                'Post updated successfully.'
            );

            return $this->redirectToRoute('app_posts_show', ['slug' => $post->getSlug()]);
        }

        return $this->render('posts/edit.html.twig', [
            'form' => $form
        ]);

    }

    #[Route('posts/{slug}/delete')]
    public function delete(Request $request, PostsRepository $postsRepository, $slug, EntityManagerInterface $manager)
    {
        $post = $postsRepository->findOneBy(['slug' => $slug]);

        if($request->isMethod('POST')) {
            $manager->remove($post);

            $manager->flush();

            $this->addFlash(
                'notice',
                'Post deleted successfully.'
            );

            return $this->redirectToRoute('app_posts');
        }

        return $this->render('posts/delete.html.twig', ['post' =>$post]);
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
}

