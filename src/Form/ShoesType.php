<?php

namespace App\Form;

use App\Entity\Shoes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ShoesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('imageFile', VichImageType::class)
            ->add('price')
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'Homme' => 'homme',
                    'Femme' => 'femme',
                    'Unisexe' => 'unisexe'
                ]
            ])
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'Nouveauté' => 'nouveaute',
                    'Classique' => 'classique',
                    'Running' => 'running',
                    'Skate' => 'skate'
                ]
            ])
            ->add('shoeSize', ChoiceType::class, [
                'choices' => [
                    '36' => '36',
                    '36.5' => '36.5',
                    '37' => '37',
                    '37.5' => '37.5',
                    '38' => '38',
                    '38.5' => '38.5',
                    '39' => '39',
                    '39.5' => '39.5',
                    '40' => '40',
                    '40.5' => '40.5',
                    '41' => '41',
                    '41.5' => '41.5',
                    '42' => '42',
                    '42.5' => '42.5',
                    '43' => '43',
                    '43.5' => '43.5',
                    '44' => '44',
                    '44.5' => '44.5',
                    '45' => '45',
                    '45.5' => '45.5',
                    '46' => '46',
                    '46.5' => '46.5',
                    '47' => '47',
                    '47.5' => '47.5',
                    '48' => '48',
                ],
                'label' => 'Pointure',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('quatityStock')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Shoes::class,
        ]);
    }
}
