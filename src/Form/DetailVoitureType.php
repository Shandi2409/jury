<?php

namespace App\Form;

use App\Entity\DetailVoiture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DetailVoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prix')
            ->add('couleur')
            ->add('modeles')
            ->add('nombre_portes')
            ->add('type_carburant')
            ->add('boite_vitesse')
            ->add('marque')
            ->add('images', FileType::class, [
                "mapped" => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DetailVoiture::class,
        ]);
    }
}
