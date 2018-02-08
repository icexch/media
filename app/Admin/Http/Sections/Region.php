<?php namespace App\Admin\Http\Sections;

use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use AdminDisplay;
use AdminColumn;
use AdminForm;
use AdminFormElement;

class Region extends Section
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
                AdminColumn::link('name', 'Name')
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
                AdminFormElement::text('name', 'Name')->required()
            ]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    public function onDelete()
    {

    }
}