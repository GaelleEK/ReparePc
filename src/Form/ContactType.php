<?php

namespace App\Form;

use App\Entity\Center;
use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'attr' => [
                    'class' => 'form-control col-md-4',
                    'placeholder' => 'Nom, prénom'
                ],
                 'required' => true,
                'label' => false
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control col-md-4',
                    'placeholder' => 'Email'
                ],
                'required' => true,
                'label' => false
            ])
            ->add('phone', TelType::class, [
                'attr' => [
                    'class' => 'form-control col-md-4',
                    'placeholder' => 'Numéro de téléphone'
                ],
                'required' => true,
                'label' => false
            ])
            ->add('address', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Adresse'
                ],
                'required' => true,
                'label' => false
            ])
            ->add('message', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Message'
                ],
                'required' => true,
                'label' => false
            ])
            ->add( 'center', HiddenType::class, [
                'attr' => [
                    'value' => 'aucun centre sélectionné'
                ]
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
            'attr' => [
                'class' => 'main-contact-form wow fadeIn',
                'data-wow-delay' => '0.2s'
            ]
        ]);
    }
}
