<?php

namespace Beachteam\BeachteamBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', [
                'label' => 'Title',
                'attr'  => ['placeholder' => 'Enter a title for the article.'],
            ])
            ->add('body', 'ckeditor',[
                'config' => [
                    'toolbar' => [
                        [
                            'name'  => 'document',
                            'items' => ['Source', '-', 'NewPage', 'DocProps', 'Preview', 'Print', '-', 'Templates'],
                        ],
                        '/',
                        [
                            'name'  => 'basicstyles',
                            'items' => ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'],
                        ]
                    ],
                    'uiColor' => '#ffffff',
                ]])
            ->add('btn_article', 'submit', [
                'label' => 'Submit article',
            ])
        ;
    }

    public function getName()
    {
        return 'item';
    }
}