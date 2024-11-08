<?php

namespace App\Form;

use App\Entity\Location;
use App\Entity\Measurement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MeasurementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
            ])
            ->add('celsius', NumberType::class, [
                'attr' => [
                    'min' => -20,
                    'max' => 40,
                ],
                'html5' => true,
            ])
            ->add('weather', TextType::class, [
                'attr' => [
                    'placeholder' => 'Describe weather conditions',
                ],
            ])
            ->add('wind_speed', NumberType::class, [
                'attr' => [
                    'min' => 0,
                    'step' => 0.1,
                ],
                'html5' => true,
            ])
            ->add('pressure', NumberType::class, [
                'attr' => [
                    'min' => 900,
                    'max' => 1100,
                ],
                'html5' => true,
            ])
            ->add('humidity', NumberType::class, [
                'attr' => [
                    'min' => 0,
                    'max' => 100,
                ],
                'html5' => true,
            ])
//            ->add('location', EntityType::class, [
//                'class' => Location::class,
//                'choice_label' => 'id',
//            ])
            ->add('location', EntityType::class, [
                'class' => 'App\Entity\Location',
                'choice_label' => 'city',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
        ]);
    }
}
