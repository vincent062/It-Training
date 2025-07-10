<?php

namespace App\Form;

use App\Entity\Formation;
// use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
// use Webmozart\Assert\Assert as AssertAssert;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id_formation',TypeTextType::class,[
                'attr'=>[
                    'class'=>'form-control',
                    'minlength'=>1,
                    'maxlength'=>800
                ],
                'label'=>'Formation',
                'label_attr'=>[
                    'class'=> 'form-label mt-4'
                ],
                'constraints'=>[
                      new Assert\Length(['min'=>1,'max'=>800]),
                      new Assert\NotBlank()
                ]
            ])
            ->add('titre', TypeTextType::class,[
               'attr'=>[
                    'class'=>'form-control',
                    'minlength'=>1,
                    'maxlength'=>800
                ],
                'label'=>'Titre',
                'label_attr'=>[
                    'class'=> 'form-label mt-4'
                ],
                'constraints'=>[
                      new Assert\Length(['min'=>1,'max'=>800]),
                      new Assert\NotBlank() 
            ]
            ])
            ->add('description',TextareaType::class,[
              'attr'=>[
                    'class'=>'form-control',
                    
                ],
                'label'=>'Description',
                'label_attr'=>[
                    'class'=> 'form-label mt-4'
                ],
                'constraints'=>[
                      new Assert\NotBlank() 
            ]
            ])  
            
            ->add('duree', IntegerType::class,[
                'attr'=>[
                    'class'=>'form-control',
                    'min'=>1,
                    'max'=>1000
                ],
                'label'=>'Durée (en heure)',
                'label_attr'=>[
                    'class'=> 'form-label mt-4'
                ],
                'constraints'=>[
                      new Assert\Range([
                        'min'=>1,
                        'max'=>1000
                    
                      ])
                      
            ]
            ])   

            ->add('prix',MoneyType::class,[
              'attr'=>[
                    'class'=>'form-control',
                   
                ],
                'currency'=>'EUR',
                'label'=>'Prix',
                'label_attr'=>[
                    'class'=> 'form-label mt-4'
                ],
                'constraints'=>[
                      new Assert\Positive(),
                      
            ]
            ])     
            
            ->add('id_soustheme_parent');
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
