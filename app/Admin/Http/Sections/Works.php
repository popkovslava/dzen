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
 * Class Works
 *
 * @property \App\Models\Work $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Works extends Section implements Initializable
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
    protected $title = "Works";

    /**
     * @var string
     */
    protected $alias = "works";

    public function initialize()
    {
        $this->addToNavigation($priority = 200, function () {
            return \App\Models\Work::count();
        });
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return "fa fa-file-text-o";
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
                AdminColumn::text('title_single', 'Title')->setWidth('500px'),
                AdminColumn::image('image', 'Image')->setWidth('400px')->setImageWidth('100px'),

                AdminColumn::custom('Published', function (\App\Models\Work $model) {
                    return $model->public ? '<i class="fa fa-check"></i>' : '<i class="fa fa-minus"></i>';
                })->setWidth('50px')->setHtmlAttribute('class', 'text-center')->setOrderable(false),

                AdminColumn::order()
                    ->setLabel('Order')
                    ->setHtmlAttribute('class', 'text-center')
                    ->setWidth('100px')
            ])->paginate(20);
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
            AdminFormElement::text('title_single', 'Title Single')->required(),
            AdminFormElement::text('title_frontend', 'Title Frontend Stack'),
            AdminFormElement::text('text_frontend', 'Text Frontend Stack'),
            AdminFormElement::text('title_backend', 'Title Backend Stack'),
            AdminFormElement::text('text_backend', 'Text Backend Stack'),
            AdminFormElement::text('title_mobile', 'Title Mobile Stack'),
            AdminFormElement::text('text_mobile', 'Text Mobile  Stack'),
            AdminFormElement::text('title_tools', 'Title ToolsStack'),
            AdminFormElement::text('text_tools', 'Text Tools Stack'),
            AdminFormElement::cropimage('image', 'Image', [
                'cropOptions' => [
                    'aspectRatio' => 16/9
                ],
                ])->required()
                ->setUploadPath(function (\Illuminate\Http\UploadedFile $file) {
                    return 'files/temp';
                }),
            AdminFormElement::cropimage('title_img', 'Title Image', [
                'cropOptions' => [
                    'aspectRatio' => 3/1
                ],
                ])->required()
                ->setUploadPath(function (\Illuminate\Http\UploadedFile $file) {
                    return 'files/temp';
                }),
            AdminFormElement::select('stack_category_id', 'Stack Category', \App\Models\StackCategory::class)
                ->setDisplay('title'),
            AdminFormElement::text('title1', 'Title1'),
            AdminFormElement::ckeditor('text1', 'Block1'),
            AdminFormElement::text('title2', 'Title2'),
            AdminFormElement::ckeditor('text2', 'Block2'),
            AdminFormElement::text('title3', 'Title3'),
            AdminFormElement::ckeditor('text3', 'Block3'),
            AdminFormElement::select('gallery_id_1', 'Gallery', \App\Models\Gallery::class)->setDisplay('title'),
            AdminFormElement::select('gallery_id_2', 'Gallery2', \App\Models\Gallery::class)->setDisplay('title'),
            AdminFormElement::select('gallery_id_3', 'Gallery3', \App\Models\Gallery::class)->setDisplay('title'),
            AdminFormElement::text('position', 'Position'),
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
