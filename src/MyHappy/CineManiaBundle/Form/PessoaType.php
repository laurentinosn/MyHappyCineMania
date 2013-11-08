<?php

namespace MyHappy\CineManiaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PessoaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('login')
            ->add('email')
            ->add('senha')
            ->add('documento')
            ->add('cidade')
            ->add('cep')
            ->add('bairro')
            ->add('nomeFantasia')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyHappy\CineManiaBundle\Entity\Pessoa'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'myhappy_cinemaniabundle_pessoa';
    }
}
