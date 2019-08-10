<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JournalType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', TextType::class,[
                'attr'=>['class'=>'form_input', 'placeholder'=>"Le type du programme"]
            ])
            ->add('libelle', TextareaType::class,[
                'attr'=>['class'=>'form_textarea']
            ])
            ->add('rmo', TextType::class,[
                'attr'=>['class'=>'form_input', 'placeholder'=>"Les responsable de l'activité"]
            ])
            /*->add('dateEvent', DateType::class)
            ->add('debut', TimeType::class,[
                'attr'=>['class'=>'form_input', 'placeholder'=>"le debut du programme", 'autocomplete'=>'off']
            ])
            ->add('fin', TimeType::class,[
                'attr'=>['class'=>'form_input', 'placeholder'=>"La fin du programme", 'autocomplete'=>'off']
            ])*/
            ->add('statut', CheckboxType::class,[
                'attr'=>['checked'=>"checked"], 'required'=>false
            ])
            //->add('flag')->add('slug')->add('publiePar')->add('modifiePar')->add('publieLe')->add('modifieLe')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Journal'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_journal';
    }


}
