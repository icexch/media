<?php namespace App\Admin\Http\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use AdminDisplay;
use AdminColumn;
use AdminForm;
use AdminFormElement;
use AdminColumnEditable;

class AdType extends Section
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
                AdminColumn::link('name', 'Name'),
                AdminColumn::text('cpc', 'CPC'),
                AdminColumn::text('cpc_value', 'Value of cpc'),
                AdminColumn::text('cpv', 'CPV'),
                AdminColumn::text('cpv_value', 'Value of cpv'),
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
                AdminFormElement::text('name', 'Name')->required(),
                AdminFormElement::text('cpc', 'CPC')->addValidationRule('numeric')->required(),
                AdminFormElement::text('cpc_value', 'Value of cpc')->addValidationRule('integer')->required(),
                AdminFormElement::text('cpv', 'CPV')->addValidationRule('numeric')->required(),
                AdminFormElement::text('cpv_value', 'Value of cpv')->addValidationRule('numeric')->required()
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