<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id_posts')
            ->add('id_notif_comments')
            ->add('id_subscription')
            ->add('id_saved_posts')
            ->add('name')
            ->add('username')
            ->add('password')
            ->add('phone_number')
            ->add('mail')
            ->add('website')
            ->add('bio')
            ->add('thumbnail')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
