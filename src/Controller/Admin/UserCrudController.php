<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;

use EasyCorp\Bundle\EasyAdminBundle\Config\configureActions;
use App\Entity\User;

use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            EmailField::new('email', 'email'),
            textField::new('password', 'password')->setFormType(PasswordType::class)->onlyOnForms(),
            ChoiceField::new('roles')
                ->setChoices([
                    'ADMIN' => 'ROLE_ADMIN',
                    'USER' => 'ROLE_USER'
                ])-> allowMultipleChoices()
        ];
    }
    
}

/*
public function configureActions(Actions $actions): Actions
{
    return $actions
        ->remove(Crud::PAGE_INDEX, Action::DELETE)
}*/