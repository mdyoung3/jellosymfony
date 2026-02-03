<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Posts;
use App\Entity\Projects;
use App\Entity\Tags;
use App\Enum\PostStatus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $tag = New Tags;
        $tag->setSlug('php');
        $tag->setName('PHP');

        $manager->persist($tag);

        $tag = New Tags;
        $tag->setSlug('javascript');
        $tag->setName('JavaScript');

        $manager->persist($tag);

        $category = New Category;
        $category->setSlug('coding');
        $category->setName('Coding');
        $category->setCreatedAt(new \DateTimeImmutable());
        $category->setUpdatedAt(new \DateTimeImmutable());

        $manager->persist($category);

        $category = New Category;
        $category->setSlug('mml');
        $category->setName('MMLs');
        $category->setCreatedAt(new \DateTimeImmutable());
        $category->setUpdatedAt(new \DateTimeImmutable());

        $manager->persist($category);

        $post = New Posts;
        $post->setTitle("It was the best of times");
        $post->setContent("This is the winter of my discontent.");
        $post->setSlug('bestoftime');
        $post->setExcerpt('Three pounds of sweet ');
        $post->setStatus(PostStatus::PUBLISHED);
        $post->setCreatedAt(new \DateTimeImmutable());
        $post->setUpdatedAt(new \DateTimeImmutable());

        $manager->persist($post);

        $post = New Posts;
        $post->setTitle("Great full-body stock");
        $post->setContent("This is onion soup");
        $post->setSlug('soupy');
        $post->setExcerpt('Sweet onions ');
        $post->setStatus(PostStatus::PUBLISHED);
        $post->setCreatedAt(new \DateTimeImmutable());
        $post->setUpdatedAt(new \DateTimeImmutable());

        $manager->persist($post);

        $project = New Projects;
        $project->setName('IFDM');
        $project->setContent("This is the project of my discontent.");
        $project->setSlug('project/ifdm');
        $project->setStatus([PostStatus::PUBLISHED]);
        $project->setCreatedDate(new \DateTimeImmutable());
        $project->setUpdatedAt(new \DateTimeImmutable());
        $project->setLink('reddit.com');
        $project->setGitHubLink('https://github.com/mdyoung3/swiss-army-app');
        $project->setFeatured(true);
        $project->setDisplayOrder(1);

        $manager->persist($project);

        $project = New Projects;
        $project->setName('middleware');
        $project->setContent("Connects legacy dataset with newer thing using graph");
        $project->setSlug('project/middleware');
        $project->setStatus([PostStatus::PUBLISHED]);
        $project->setCreatedDate(new \DateTimeImmutable());
        $project->setUpdatedAt(new \DateTimeImmutable());
        $project->setLink('marcyoung.com');
        $project->setGitHubLink('https://github.com/mdyoung3/swiss-army-app');
        $project->setFeatured(false);
        $project->setDisplayOrder(2);

        $manager->persist($project);


        $manager->flush();
    }
}
