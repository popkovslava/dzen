<?php

namespace App\Admin\Http\Sections;

use Meta;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;


/**
 * Class  ClientsSection
 *
 * @property \App\Models\ClientsSection $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class ClientsSection extends Section implements Initializable
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;


    /**
     * @var string
     */
    protected $title="Clients";

    /**
     * @var string
     */
    protected $alias='clients-section';


    public function initialize()
    {
        app()->booted(function () {
            \AdminNavigation::getPages()->findById('client-section')->addPage(
                $this->makePage(
                    908,
                    function () {
                        return \App\Models\ClientsSection::count();
                    }
                )
            );
        });
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary')
            ->setApply(function ($query) {
                $query->orderBy('position', 'asc');
            })
            ->setColumns([
                AdminColumn::text('id', 'Id'),
                AdminColumn::text('name', 'Name')->setWidth('600px'),
                AdminColumn::image('image', 'Image')->setWidth('400px')->setImageWidth('100px'),
                AdminColumn::relatedLink('clientsSectionCategory.title', 'Category')->setWidth('300px'),
                AdminColumn::custom('Published', function (\App\Models\ClientsSection $model) {
                    return $model->public ? '<i class="fa fa-check"></i>' : '<i class="fa fa-minus"></i>';
                })->setWidth('50px')->setHtmlAttribute('class', 'text-center')->setOrderable(false),
                AdminColumn::order()
                    ->setHtmlAttribute('class', 'text-center')
                    ->setLabel('Order')
                    ->setWidth('100px')
            ])->paginate(20);
    }


    /**
     * @return string
     */
    public function getIcon()
    {
        return 'fa fa-address-card';
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        Meta::loadPackage(['cropper', 'vue-cropimage']);

        return AdminForm::panel()->addBody([
            AdminFormElement::checkbox('public', 'Published'),
            AdminFormElement::select(
                'clients_section_category_id',
                'Clients Section Category',
                \App\Models\ClientsSectionCategory::class
            )->setDisplay('title')->required(),
            AdminFormElement::text('name', 'Name')->required(),
            AdminFormElement::text('description', 'Description'),
            AdminFormElement::ckeditor('text', 'Comment'),
            AdminFormElement::cropimage('image', 'Image', [
                'cropOptions' => [
                    'aspectRatio' => 1/1
                ],
                ])->required()
                ->setUploadPath(function (\Illuminate\Http\UploadedFile $file) {
                    return 'files/temp';
                }),
            AdminFormElement::text('alt', 'Alt image'),
            AdminFormElement::text('position', 'Position'),
            AdminFormElement::text('link_in', 'Instagram'),
            AdminFormElement::text('link_fb', 'FaceBook'),
            AdminFormElement::multiselect('link', 'Button', \App\Models\Link::class)->setDisplay('title'),
        ]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
