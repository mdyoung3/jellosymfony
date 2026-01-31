<?php

namespace App\DataFixtures;

use App\Entity\Posts;
use App\Enum\PostStatus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
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

        $manager->flush();
    }
}
