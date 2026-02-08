<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Projects;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('slug')
            ->add('content')
            ->add('excerpt')
            ->add('status')
            ->add('featureImage')
            ->add('link')
            ->add('gitHubLink')
            ->add('liveUrl')
            ->add('demoUrl')
            ->add('techStack')
            ->add('screenshot')
            ->add('featured')
            ->add('displayOrder')
            ->add('startDate', null, [
                'widget' => 'single_text',
            ])
            ->add('completedDate', null, [
                'widget' => 'single_text',
            ])
            ->add('createdDate', null, [
                'widget' => 'single_text',
            ])
            ->add('updatedAt', null, [
                'widget' => 'single_text',
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Projects::class,
        ]);
    }
}
