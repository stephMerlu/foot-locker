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
                    'Tous les prix' => json_encode(['tous les prix']),
                    'Moins de 50€' => json_encode(['min' =>0, 'max' =>50]),
                    'Entre 50 et 100€' => json_encode(['min' =>50, 'max' =>100]),
                    'Entre 100 et 150€' => json_encode(['min' =>100, 'max' =>150]),
                    'Plus de 150€' => json_encode(['min' =>150, 'max' => 200])
                ],
                'label' => 'Filtrer par prix',
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
