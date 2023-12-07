<?php

namespace App\Form;

use App\Model\RechercheGite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RechercheGiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('region', TextType::class, [
                'required' => false,
            ])
            ->add('departement', TextType::class, [
                'required' => false,
            ])
            ->add('ville', TextType::class, [
                'required' => false,
            ])
            ->add('equipements', TextType::class, [
                'required' => false,
            ])
            ->add('services', TextType::class, [
                'required' => false,
                // 'placeholder' => 'location de linge'
            ])
            ->add('animauxacceptes', CheckboxType::class, [
                'required' => false,
            ])
            ->add('rechercher', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RechercheGite::class,
        ]);
    }
}
