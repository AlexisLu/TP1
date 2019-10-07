<?php

namespace App\Form;

use App\Entity\Bien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
Use Symfony\Component\Form\Extension\Core\Type\SubmitType;
Use Symfony\Component\Form\Extension\Core\Type\TextType;
Use Symfony\Component\Form\Extension\Core\Type\ResetType;
Use Symfony\Component\Form\Extension\Core\Type\IntegerType;
Use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class UpdateFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nb_piece',TextType::class, array('label'=> 'Nombres de pièces :', 'attr'=>array('class'=>'form-control')))
            ->add('nb_chambre',TextType::class, array('label'=> 'Nombres de chambres :', 'attr'=>array('class'=>'form-control')))
            ->add('superficie',IntegerType::class, array('label'=>'Superficie :', 'attr'=>array('class'=>'form-control')))
            ->add('prix',MoneyType::class, array('label'=>'Prix :', 'attr'=>array('class'=>'form-control')))
            ->add('chauffage',TextType::class, array('label'=> 'Type de chauffage :', 'attr'=>array('class'=>'form-control')))
            ->add('annee',TextType::class, array('label'=> 'Année :', 'attr'=>array('class'=>'form-control')))
            ->add('localisation',TextType::class, array('label'=> 'Localisation :', 'attr'=>array('class'=>'form-control')))
            ->add('etat',TextType::class, array('label'=> 'Etat :', 'attr'=>array('class'=>'form-control')))
            ->add('type',EntityType:: class, array('class'=> 'App\Entity\Type', 'choice_label'=>'libelle'))
            ->add('valider',SubmitType::class, array('label'=> 'Valider', 'attr'=>array('class'=>'btn btn-primary btn-block')))
            ->add('annuler',ResetType::class,array('label'=>'Quitter','attr'=>array('class'=>'btn btn-primary btn-block')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bien::class,
        ]);
    }
}
