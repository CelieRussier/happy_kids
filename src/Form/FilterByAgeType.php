<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterByAgeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('age', ChoiceType::class, [
                'label' => '',
                'choices' => [
                    '0-3ans' => "0-3ans",
                    '3-6ans' => "3-6ans",
                    '6-12ans' => "6-12ans",
                    '12-99ans' => "12-99ans"
                ]
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
