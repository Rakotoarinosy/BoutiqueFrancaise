<?php

namespace App\Controller\Admin;

use App\Entity\Order;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;

class OrderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Order::class;
    }

    public function configActions(Actions $actions) : configActions
    {
        return $actions
        ->add('index','detail');

    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            //yield DateTimeField::new('createdAt','Passé le')->setFormat('long', 'none'),
            TextField::new('user.getFullName','Utilisateur'),
            MoneyField::new('total')->setCurrency('EUR'),
            BooleanField::new('isPaid','Payée'),
            DateTimeField::new('createdAt')->setFormat(DateTimeField::FORMAT_LONG, DateTimeField::FORMAT_NONE)

        ];
    }
    
}
