<?php

namespace App\Form;

use App\Entity\Formation;
use App\Entity\SousTheme;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
// use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
// use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
// use Webmozart\Assert\Assert as AssertAssert;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('id_formation',TypeTextType::class,[
            //     'attr'=>[
            //         'class'=>'form-control',
            //         'minlength'=>1,
            //         'maxlength'=>800
            //     ],
            //     'label'=>'Formation',
            //     'label_attr'=>[
            //         'class'=> 'form-label mt-4'
            //     ],
            //     'constraints'=>[
            //           new Assert\Length(['min'=>1,'max'=>800]),
            //           new Assert\NotBlank()
            //     ]
            // ])
            ->add('nom', TextType::class,[
               'attr'=>[
                    'class'=>'form-control',
                    'minlength'=>1,
                    'maxlength'=>800
                ],
                'label'=>'Nom de la formation',
                'label_attr'=>[
                    'class'=> 'form-label mt-4',
                    'attr' => ['placeholder' => 'ex: Introduction à Symfony'],
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
            
            ->add('duree', DateTimeType ::class,[
                'attr'=>[
                    'class'=>'form-control',
                    'min'=>1,
                    'max'=>1000
                ],
                'label'=>'Date et Durée (en heure)',
                'label_attr'=>[
                    'class'=> 'form-label mt-4',
                    'widget' => 'single_text',
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
            
            //  ->add('sousthemeParent', EntityType::class, [
            //     'class' => SousTheme::class,
            //     // 'choice_label' => 'nom', // Assurez-vous d'avoir une propriété 'nom' ou similaire dans votre entité SousTheme
            //     'choice_label' => function(SousTheme $sousTheme) {
            //         // Si vous voulez afficher le nom du thème parent également
            //         return $sousTheme->getTheme()->getNom() . ' -> ' . $sousTheme->getNom();
            //      },
            //     'label' => 'Sous-thème associé',
            //     'placeholder' => 'Sélectionnez un sous-thème',
            // ]);
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
