<?php

namespace CreaQCM\QCMBundle\Form;

use CreaQCM\QCMBundle\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('ask', TextType::class, array(
            'label' => 'Question',
            'attr' => array('class' => 'col-lg-12'),
            'required' => true,
        ));
        $builder->add('choices', CollectionType::class, array(
            'entry_type' => ChoiceType::class,
            'allow_add'    => true,
            'by_reference' => false,
            'allow_delete' => true,
            'label' => false,
        ));
        $builder->add('response', HiddenType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Question::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'crea_qcmqcmbundle_question';
    }
}
