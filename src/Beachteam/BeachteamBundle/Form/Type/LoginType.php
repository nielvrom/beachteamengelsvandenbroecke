<?php

namespace Beachteam\BeachteamBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text',[
                'label' => false,
                'attr'  => [
                    'placeholder' => 'Geef uw username in.',
                    'autocomplete'=> 'off'
                ],
            ])
            ->add('password', 'password', [
                'label' => false,
                'attr'  => [
                    'placeholder' => 'Geef uw paswoord in.'
                ],
            ])
            ->add('btn_login', 'submit', [
                'label' => 'Inloggen',
            ])
        ;
    }

    public function getName()
    {
        return 'login';
    }
}