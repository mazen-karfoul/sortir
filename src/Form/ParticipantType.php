<?php

namespace App\Form;

use App\Entity\Campus;
use App\Entity\Participant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParticipantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username',TextType::class,[
                'label'=>'Pseudo : '
            ])
            ->add('prenom', TextType::class,[
                'label'=> 'Prenom'
            ])
            ->add('nom' , TextType::class,[
                'label'=>'Nom : '
            ])
            ->add('telephone',TextType::class,[
                'label'=>'Téléphone : '
            ])
            ->add('email',TextType::class,[
                'label'=> 'Email : '
            ])
            ->add('password',RepeatedType::class,[
                'type' => PasswordType::class,


                'required' => true,
                'first_options'  => ['label' => 'Password'],
                'second_options' => ['label' => 'Confirmation'],
            ])
            ->add('campus',EntityType::class,[
                'label'=> "Campus ",
                'class'=>Campus::class ,
                'choice_label'=> "nom"

            ])

            ->add('photo',TextType::class,[
                'label'=>'Ma Photo : ',
                'required'=>false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
           'data_class' => Participant::class
        ]);
    }
}
