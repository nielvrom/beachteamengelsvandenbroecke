<?php
// src/Blogger/BlogBundle/Form/EnquiryType.php

namespace Beachteam\BeachteamBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Beachteam\BeachteamBundle\Form\Type\ItemType;

class MediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('item', new ItemType())
            ->add('url', 'file', [

            ])
        ;
    }

    public function getName()
    {
        return 'media';
    }
}