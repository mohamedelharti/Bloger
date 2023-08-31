<?php
    namespace App\Form\Type;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            -> add('content', TextareaType::class, [
                'label' => 'Votre message'
            ])
            ->add('article', HiddenType::class)
            ->add('Send', SubmitType::class, [
                'label' => 'Envoyer'
            ]);
        
        $builder -> get('article')
            -> addModelTransformer(new CallbackTransformer(
                fn (Article $article) => $article ->getId(),
                fn (Article $article) => $article ->getTitle()
            ));
    }
}