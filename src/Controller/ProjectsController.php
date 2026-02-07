<?php

namespace App\Controller;

use App\Entity\Projects;
use App\Repository\ProjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProjectsController extends AbstractController
{
    #[Route('/projects', name: 'app_projects')]
    public function index(ProjectsRepository $projectsRepository): Response
    {
        return $this->render('projects/index.html.twig', [
            'projects' => $projectsRepository->findBy([], ['displayOrder' => 'ASC']),
        ]);
    }

    #[Route('/projects/{slug}', name: 'app_projects_show')]
    public function show(ProjectsRepository $projectsRepository, $slug): Response
    {
        if ($projectsRepository === null){
            throw $this->createNotFoundException('Post not found.');
        }

        $project = $projectsRepository->findOneBy(['slug' => $slug]);

        return $this->render('projects/show.html.twig', [
            'project' => $project,
        ]);
    }
}
