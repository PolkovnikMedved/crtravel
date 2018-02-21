<?php

namespace CRTravelBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartnerEditType extends AbstractType
{
    /**
    * {@inheritdoc}
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, array('required' => false))
        ->add('email', EmailType::class)
        ->add('phone', TextType::class)
        ->add('address', TextareaType::class)
        ->add('latitude', TextType::class)
        ->add('longitude', TextType::class)
        ->add('horary', TextType::class)
        ->add('comment', TextareaType::class)
        ->add('isSpecialOffer', CheckboxType::class, array('required' => false))
        ->add('offer', TextType::class)
        ->add('tripAdvisorLink', UrlType::class)
        ->add('country', TextType::class)
        ->add('location',EntityType::class, array(
        'class' => 'CRTravelBundle:Location',
        'choice_label' => 'name'
        ))
        ->add('type', EntityType::class, array(
        'class' => 'CRTravelBundle:PartnerType',
        'choice_label' => 'name'
        ))
        ->add('hotWords', CollectionType::class, array(
        'entry_type' => HotWordType::class,
        'allow_add' => true,
        'allow_delete' => true,
        'by_reference' => false
        ));
    }

    /**
    * {@inheritdoc}
    */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CRTravelBundle\Entity\Partner'
        ));
    }

    /**
    * {@inheritdoc}
    */
    public function getBlockPrefix()
    {
        return 'crtravelbundle_partner_edit';
    }

}
