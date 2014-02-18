<?php

namespace Beachteam\BeachteamBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', [
                'label' => 'Titel*',
                'attr'  => [
                    'placeholder' => 'Geef een titel in.',
                    'autocomplete' => 'off'
                ]
            ])
            ->add('description', 'textarea', [
                'label' => 'Beschrijving*',
                'attr'  => [
                    'placeholder' => 'Geef een beschrijving in.',
                    'autocomplete' => 'off',
                    'rows'  => 3
                ]
            ])
        ;
    }

    public function getName()
    {
        return 'item';
    }
}