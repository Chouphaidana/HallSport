<?php

namespace App\Form;

use App\Entity\Hall;
use SebastianBergmann\CodeCoverage\Report\Text;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HallBecomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('hall',TextType::class,[
                'label'=>'Votre Salle de Sport :'
            ])
            ->add('phone',NumberType::class,[
                'label'=>'Votre Numéro de Téléphone :'
            ])

            ->add('adresse',TextType::class,[
                'label'=>'L\'adresse de votre Salle :'
            ])
            ->add('town',TextType::class,[
                'label'=>'La Ville ou se trouve votre Salle :'
            ])
            ->add('country',TextType::class,[
                'label'=>'Le Pays ou se trouve votre Salle :'
            ])
            ->add('email',EmailType::class,[
                'label'=>'Votre Adresse Mail : ( Attention : Cette Adresse Mail sera l\'identifiant de votre Salle de Sport )'
            ])
            ->add('password',RepeatedType::class,[
                'type'=>PasswordType::class,
                'invalid_message'=>'Vos Mot de Passes doivent être identique...',
                'label'=>'Votre Mot de Passe :',
                'required'=>true,
                'first_options'=>[
                    'label'=>'Votre Mot de Passe :',
                    'attr'=>[
                        'placeholder'=>'123456789'
                    ]
                ],
                'second_options'=>[
                    'label'=>'Confirmez Votre Mot de Passe :',
                    'attr'=>[
                        'placeholder'=>'123456789'
                    ]
                ]
            ])
            ->add('drink',RadioType::class,[
                'label'=>'Souhaitez vous vendre des Boissons ?'
            ])
            ->add('sendmail',RadioType::class,[
                'label'=>'Souhaitez vous pouvoir envoyez des Mails promosionnel ?'
            ])
            ->add('formation',RadioType::class,[
                'label'=>'Souhaitez vous que l\'on forme vos employés ?'
            ])
            ->add('planning',RadioType::class,[
                'label'=>'Souhaitez vous que l\'on gére le planning de vos Employés ?'
            ])
            ->add('submit', SubmitType::class,[
                'label'=>'Devenir Partenaire'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Hall::class,
        ]);
    }
}
