<?php

namespace App\Form;

use App\Entity\MarqueDeVoiture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class MarqueDeVoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('creation', TextType::class)
            ->add('fondateurs', TextType::class)
            ->add('filiales', TextType::class)
            ->add('images', FileType::class, [
                "mapped" => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MarqueDeVoiture::class,
        ]);
    }
}
