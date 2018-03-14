<?php namespace App\Admin\Http\Sections;

use App\Models\AdType;
use App\Models\User\Advertiser;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use App\Models\Region;
use App\Models\Category;
use AdminDisplay;
use AdminColumn;
use AdminForm;
use AdminFormElement;
use AdminColumnEditable;

class AdMaterial extends Section
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
        return AdminDisplay::datatablesAsync()->setModelClass(\App\Models\AdMaterial::class)
            ->setColumns([
                AdminColumn::link('name', 'Name'),
                AdminColumn::relatedLink('advertiser.name', 'Advertiser')->setOrderable(true),
                AdminColumn::text('adType.name', 'Type'),
                AdminColumn::relatedLink('region.name', 'Region')->setOrderable(true),
                AdminColumn::relatedLink('category.name', 'Category')->setOrderable(true),
                AdminColumn::text('type', 'Type'),
                AdminColumn::custom('Source', function (\App\Models\AdMaterial $material) {
                    if ($material->type === \App\Models\AdMaterial::TYPE_IMG) {
                        return "<a href='/$material->source' target='_blank'><i class='fa fa-arrow-circle-o-right'></i></a>";
                    }

                    return "<a href='" . action('AdvertiserController@showMaterialSource',
                            $material->id) . "' target='_blank'><i class='fa fa-arrow-circle-o-right'></i></a>";
                })->setWidth(50),
                AdminColumn::url('ad_url', 'Url')->setOrderable(false)->setWidth(50),
                AdminColumnEditable::checkbox('is_active', 'active', 'inactive', 'Activity')
            ])->setApply([
                function ($query) {
                    $query->orderBy('is_active', 'asc');
                }
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
                AdminFormElement::select('user_id', 'Advertiser', Advertiser::class)->setDisplay('name')->required(),
                AdminFormElement::select('ad_type_id', 'Ad Type', AdType::class)->setDisplay('name')->required(),
                AdminFormElement::select('region_id', 'Region', Region::class)->setDisplay('name')->required(),
                AdminFormElement::select('category_id', 'Category', Category::class)->setDisplay('name')->required(),
                AdminFormElement::select('type', 'Type')
                    ->setOptions([
                        'HTML' => \App\Models\AdMaterial::TYPE_HTML,
                        'IMG'  => \App\Models\AdMaterial::TYPE_IMG
                    ])
                    ->required(),
                AdminFormElement::text('source', 'Source'),
                AdminFormElement::text('ad_url', 'Ad Url'),
                AdminFormElement::checkbox('is_active', 'Active')
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