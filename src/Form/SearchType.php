<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('price', ChoiceType::class, [
                'choices' => [
                    'Moins de 50€' => json_encode(['min' =>0, 'max' =>50]),
                    'Entre 50 et 100€' => json_encode(['min' =>50, 'max' =>100]),
                    'Entre 100 et 150€' => json_encode(['min' =>100, 'max' =>150]),
                    'Plus de 150€' => json_encode(['min' =>150, 'max' => 200])
                ],
                'label' => 'Filtrer par prix',
                'required' =>false,
            ])
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'Homme' => 'homme',
                    'Femme' => 'femme',
                    'Unisexe' => 'unisexe'
                ],
                'label' => 'Filtrer par sexe',
                'required' =>false,
            ])
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'Nouveauté' => 'nouveaute',
                    'Classique' => 'classique',
                    'Running' => 'running',
                    'Skate' => 'skate'
                ],
                'label' => 'Filtrer par catégorie',
                'required' =>false,
            ])
            ->add('orderBy', ChoiceType::class, [
                'choices' => [
                    'Plus récent' => 'DESC',
                    'Plus ancien' => 'ASC',
                ],
                'label' => 'Trier par',
                'required' => false,
                'expanded' => false,
                'multiple' => false,
                'data' => 'DESC',
                'attr' => [
                    'class' => 'form-control'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
