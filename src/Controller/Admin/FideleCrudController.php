<?php

namespace App\Controller\Admin;

use App\Entity\Fidele;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FideleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Fidele::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
