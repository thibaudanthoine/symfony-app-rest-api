<?php

namespace Thibaud\MeetupBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class MeetupType
 *
 * @package Thibaud\MeetupBundle\Form
 */
class MeetupType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('time')
            ->add('location')
            ->add('details');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Thibaud\MeetupBundle\Entity\Meetup'
        ));
    }

    public function getName()
    {
        return 'thibaud_meetupbundle_meetuptype';
    }
}