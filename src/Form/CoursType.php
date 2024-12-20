<?php

namespace App\Form;

use App\Entity\Cours;
use App\Entity\Niveau;
use App\Entity\professeur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('module')
            ->add('professeur', EntityType::class, [
                'class' => professeur::class,
                'choice_label' => 'id',
            ])
            ->add('niveau', EntityType::class, [
                'class' => Niveau::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cours::class,
        ]);
    }
}
