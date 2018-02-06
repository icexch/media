<?php namespace App\Admin\Http\Sections\Users;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use AdminDisplay;
use AdminColumn;
use AdminForm;
use AdminFormElement;

class User extends Section
{
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary table-bordered')
            ->setColumns([
                AdminColumn::link('name', 'Username'),
                AdminColumn::email('email', 'Email')->setWidth('150px')
            ]);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::panel()
            ->addBody([
                AdminFormElement::text('name', 'Username')->required(),
                AdminFormElement::password('password', 'Password')->allowEmptyValue()->addValidationRule('min:6'),
                AdminFormElement::text('email', 'E-mail')->required()->addValidationRule('email'),
                AdminFormElement::text('profile.company_name', 'Company Name'),
                AdminFormElement::text('profile.phone', 'Phone')->addValidationRule('numeric'),
                AdminFormElement::text('profile.city', 'City'),
                AdminFormElement::text('profile.country', 'Country')
        ]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }
}