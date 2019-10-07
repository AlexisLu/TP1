<?php

namespace App\Form;

use App\Entity\Visite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
Use Symfony\Component\Form\Extension\Core\Type\SubmitType;
Use Symfony\Component\Form\Extension\Core\Type\ResetType;

class VisiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id_date',DateType::class, array('label'=> 'Date :', 'attr'=>array('class'=>'form-control')))
            ->add('suite',TextType::class, array('label'=> 'Suite :', 'attr'=>array('class'=>'form-control')))
            ->add('bien',EntityType:: class, array('class'=> 'App\Entity\Bien', 'choice_label'=>'id'))
            ->add('visiteur',EntityType:: class, array('class'=> 'App\Entity\Visiteur', 'choice_label'=>'nom'))
            ->add('valider',SubmitType::class, array('label'=> 'Valider', 'attr'=>array('class'=>'btn btn-primary btn-block')))
            ->add('annuler',ResetType::class,array('label'=>'Quitter','attr'=>array('class'=>'btn btn-primary btn-block')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Visite::class,
        ]);
    }
}
