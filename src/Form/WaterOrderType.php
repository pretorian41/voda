<?php

namespace App\Form;

use App\DTO\OrderDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WaterOrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $input = 'w-full rounded-xl border border-slate-200 px-4 py-3
                  focus:outline-none focus:ring-2 focus:ring-sky-400';

        $builder
            ->add('name', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Імʼя',
                    'class' => $input,
                ],
            ])

            ->add('phone', TelType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => '+380 (__) ___-__-__',
                    'class' => $input,
                    'data-phone' => '1',
                    'inputmode' => 'tel',
                    'autocomplete' => 'tel',
                ],
            ])

            ->add('amount', IntegerType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Кількість бутелів',
                    'min' => 1,
                    'max' => 20,
                    'class' => $input,
                ],
            ])

            ->add('address', TextareaType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Адреса доставки та побажання',
                    'rows' => 2,
                    'class' => $input,
                ],
            ])
            ->add('website', TextType::class, [
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'tabindex' => '-1',
                    'autocomplete' => 'off',
                    'class' => 'hidden',
                ],
            ]);
        ;
//
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'csrf_protection' => true,
            'data_class' => OrderDTO::class,
        ]);
    }
}
