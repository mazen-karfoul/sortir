<?php

namespace App\Form;

use App\Entity\Sortie;

use Faker\Provider\DateTime;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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

            ->add('dateDebut', DateType::class , [
               'label' => 'Date et heure de la sortie : ',
               'years' => range(2020,2030),
                'widget' => 'single_text',
                'html5' => 'true'

            ])

            ->add('dateCloture', DateType::class , [
                'label' => 'Date limite inscription : ',
                'years'=> range(2020,2030),
                'widget' => 'single_text',
                'html5' => 'true'

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
                    'maxlength' => 255
                ]
            ])

            ->add('lieu', EntityType::class, [
                'label' => 'Lieu : ',
                'class' => 'App\Entity\Lieu',
                'choice_label' => 'nom'
            ])

            ->add('enregistrer', SubmitType::class, [
                'label' => 'Enregistrer la sortie',
                'attr' => [
                    'class' => 'btn btn-light'
                ]
            ])

            ->add('publier', SubmitType::class, [
                'label' => 'Publier la sortie',
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ]);



        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,

        ]);
    }
}
