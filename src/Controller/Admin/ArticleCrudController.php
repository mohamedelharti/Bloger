<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            yield TextField::new('title'),
            yield SlugField::new('slug') ->setTargetFieldName('title'),
            yield TextEditorField::new('content'),
            yield TextField::new('featuredText'),
            yield AssociationField::new('categories'),
            yield DateField::new('createdAt')->hideOnForm(),
            yield DateField::new('updatedAt')->hideOnForm(),
        ];
    }
   
}
