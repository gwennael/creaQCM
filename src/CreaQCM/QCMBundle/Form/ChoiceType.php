<?php

namespace CreaQCM\QCMBundle\Form;

use CreaQCM\QCMBundle\Entity\Choice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('value', TextType::class, array(
            'label' => 'Réponse',
            'required' => true,
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Choice::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'crea_qcmqcmbundle_choice_type';
    }
}
