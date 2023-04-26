<?php

namespace App\Form;

use App\Entity\Fidele;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FideleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenoms')
            ->add('contact')
            ->add('quartier')
            ->add('profession')
            ->add('anneeDeSalut')
            ->add('dateNaissance')
            ->add('lieuCellule')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fidele::class,
        ]);
    }
}
