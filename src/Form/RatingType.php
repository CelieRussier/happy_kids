<?php

namespace App\Form;

use App\Entity\Rating;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RatingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('age', ChoiceType::class, [
                'label' => "Catégorie d'âge",
                'choices' => ['0-3ans' => '0-3ans', '3-6ans' => '3-6ans', '6-12ans' => '6-12ans', '12-99ans' => '12-99ans'],
                'expanded' => true,
                'multiple' => false,
                'required' =>false
                ])
            ->add('rate', ChoiceType::class, [
                'label' => "Evaluation",
                'choices' => ['0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'],
                'expanded' => true,
                'multiple' => false,
                'required' => false
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rating::class,
        ]);
    }
}
