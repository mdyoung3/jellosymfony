<?php

namespace App\Controller;

use App\Entity\Tags;
use App\Repository\TagsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TagsController extends AbstractController
{
    #[Route('/tags', name: 'app_tags')]
    public function index(TagsRepository $tagsRepository): Response
    {
        return $this->render('tags/index.html.twig', [
            'tags' => $tagsRepository->findAll(),
        ]);
    }

    #[Route('/tag/{slug}', name: 'app_tags_show')]
    public function show(Tags $tag): Response
    {
        return $this->render('tags/show.html.twig', [
            'tag' => $tag,
        ]);
    }
}
