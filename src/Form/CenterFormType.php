<?php

namespace App\Form;

use App\Entity\Center;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CenterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('address', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control form-label mt10'
                ]])

            ->add('city', TextType::class, [
                'label' => false,
                'attr' => ['class' => 'form-control'],
                'label_attr' => ['class' => 'form-label mt10']])

            ->add('lat', NumberType::class, [
                'label' => false,
                'attr' => ['class' => 'form-control'],
                'label_attr' => ['class' => 'form-label mt10']])

            ->add('lon', NumberType::class, [
                'label' => false,
                'attr' => ['class' => 'form-control'],
                'label_attr' => ['class' => 'form-label mt10']])

            ->add('schedule', TextType::class, [
                'label' => false,
                'attr' => ['class' => 'form-control'],
                'label_attr' => ['class' => 'form-label mt10']])

           ;
    }


}
