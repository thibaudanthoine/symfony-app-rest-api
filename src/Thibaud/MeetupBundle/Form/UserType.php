<?php

namespace Thibaud\MeetupBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Thibaud\MeetupBundle\Entity\User',
                'csrf_protection' => false
            )
        );
    }

    public function getName()
    {
        return 'thibaud_meetupbundle_usertype';
    }
}