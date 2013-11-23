<?php

namespace MyHappy\CineManiaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PublicidadeType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dataInicio')
            ->add('dataFim')
            ->add('nome')
            ->add('imagem', 'file', array(
                'data_class' => null
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyHappy\CineManiaBundle\Entity\Publicidade'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'myhappy_cinemaniabundle_publicidade';
    }
}
