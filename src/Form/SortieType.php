<?php

namespace App\Form;

use App\Entity\Sortie;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormTypeInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de la sortie :',
                'attr' => [
                    'maxlength' => 50
                ]
            ])

            ->add('dateDebut', DateTimeType::class, [
               'label' => 'Date et heure de la sortie : ',
               'years' => range(2020,2030)
            ])

            ->add('dateCloture', DateTimeType::class, [
                'label' => 'Date limite inscription : ',
                'years'=> range(2020,2030)
            ])

            ->add('nbInscriptionsMax', IntegerType::class, [
                'label' => 'Nombre de place : ',
                'attr' => [
                    'min' => '1',
                    'max' => '50'
                ]
            ])

            ->add('duree', IntegerType::class, [
                'label' => 'Durée : '
            ])

            ->add('commentaires', TextareaType::class, [
                'label'=> 'Description et infos : ',
                'required' => 'false',
                'attr' => [
                    'maxlength' => 500
                ]
            ])

            ->add('campus', EntityType::class, [
                'label' => 'Lieu : ',
                'class' => 'App\Entity\Campus',
                'choice_label' => 'nom'
            ])





        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,

        ]);
    }
}
