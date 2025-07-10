<?php

namespace App\Form;

use App\Entity\SousTheme;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class SousThemeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ID_soustheme')
            ->add('nom',TextType::class,[
              'attr'=>[
                    'class'=>'form-control',
                    'minlength'=>1,
                    'maxlength'=>50
                ],
                'label'=>'Nom',
                'label_attr'=>[
                    'class'=> 'form-label mt-4'
                ],
                'constraints'=>[
                      new Assert\Length(['min'=>2,'max'=>50]),
                      new Assert\NotBlank()
                ]
            ])  
            ->add('id_theme_parent')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SousTheme::class,
        ]);
    }
}
