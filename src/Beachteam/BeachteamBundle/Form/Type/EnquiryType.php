<?php
// src/Blogger/BlogBundle/Form/EnquiryType.php

namespace Beachteam\BeachteamBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EnquiryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', [
            'label' => 'Naam',
            'attr'  => ['placeholder' => 'Geef uw naam in.'],
        ]);
        $builder->add('email', 'email',[
            'label' => 'Email',
            'attr'  => ['placeholder' => 'Geef uw email-adres in.']
        ]);
        $builder->add('subject', 'text', [
            'label' => 'Onderwerp',
            'attr'  => ['placeholder' => 'Geef het onderwerp van de mail in.'],
        ]);
        $builder->add('body', 'textarea', [
            'label' => 'Bericht',
            'attr' => [
                'rows' => 10,
                 'placeholder' => 'Geef hier uw bericht in.'
            ],
        ]);
        $builder->add('btn_contact', 'submit', [
                'label' => 'Verzenden',
        ])
    ;
    }

    public function getName()
    {
        return 'contact';
    }
}