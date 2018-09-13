<?php

namespace App\Admin\Http\Sections;

use Meta;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminDisplayFilter;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

/**
 * Class ImgGalleries
 * @package App\Admin\Http\Sections
 */
class ImgGalleries extends Section implements Initializable
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
    protected $title = "Images";

    /**
     * @var string
     */
    protected $alias = "img-galleries";

    public function initialize()
    {
        app()->booted(function () {
            \AdminNavigation::getPages()->findById('galleries-section')->addPage(
                $this->makePage(
                    902,
                    function () {
                        return \App\Models\ImgGallery::count();
                    }
                )
            );
        });
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return 'fa fa-picture-o';
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary')
            // ->setApply(function ($query) {
            //     $query->orderBy('position', 'asc');
            // })
            ->setFilters(
                AdminDisplayFilter::field('gallery_id')->setTitle('Gallery ID [:value]')
            )
            ->setColumns([
                AdminColumn::text('id', 'Id'),
                AdminColumn::text('title', 'Title'),
                AdminColumn::filter('gallery_id'),
                AdminColumn::image('image', 'Image')->setWidth('300px')->setImageWidth('150px'),
                AdminColumn::relatedLink('gallery.title', 'Gallery')
                ->setWidth('200px'),
                AdminColumn::custom('Published', function (\App\Models\ImgGallery $model) {
                    return $model->public ? '<i class="fa fa-check"></i>' : '<i class="fa fa-minus"></i>';
                })->setWidth('50px')->setHtmlAttribute('class', 'text-center')->setOrderable(false),
                AdminColumn::order()
                   ->setLabel('Order')
                   ->setHtmlAttribute('class', 'text-center')
                   ->setWidth('100px'),
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
            AdminFormElement::select('gallery_id', 'Gallery', \App\Models\Gallery::class)
                ->setDisplay('title')->required(),
            AdminFormElement::text('title', 'Title')->required(),
            AdminFormElement::text('description', 'Description'),
            AdminFormElement::select('stack_category_id', 'Stack Category', \App\Models\StackCategory::class)
                ->setDisplay('title'),
            AdminFormElement::text('link_to', 'link to'),
            AdminFormElement::cropimage('image', 'Crop image', [
                'cropOptions' => [
                    'aspectRatio' => 16/9
                ],
                'getCroppedCanvas' => [
                    'maxWidth' =>  4096,
                    'maxHeight' =>  4096/(16/9),
                ]
                ])->setUploadPath(function (\Illuminate\Http\UploadedFile $file) {
                    return 'files/temp';
                }),
            AdminFormElement::cropimage('image_height', 'Crop image height', [
                'cropOptions' => [
                    'aspectRatio' => 9/16
                ],
                'getCroppedCanvas' => [
                    'maxWidth' =>  4096,
                    'maxHeight' =>  4096/(9/16),
                ]
                ])->setUploadPath(function (\Illuminate\Http\UploadedFile $file) {
                    return 'files/temp';
                }),
            AdminFormElement::cropimage('title_img', 'Image Title', [
                    'cropOptions' => [
                        'aspectRatio' => 3/1
                    ]
                ])->setUploadPath(function (\Illuminate\Http\UploadedFile $file) {
                        return 'files/temp';
                }),
            AdminFormElement::select(
                'position_img',
                'Position Images Horizontal',
                [
                    'left' => 'Left',
                    'right' => 'Right',
                    'center' => 'Center'
                ]
            ),
            AdminFormElement::select(
                'position_img_vertical',
                'Position Images Vertical',
                [
                    'top' => 'Top',
                    'bottom' => 'Bottom',
                    'center' => 'Center'
                ]
            ),
            AdminFormElement::text('alt', 'Alt image'),
            AdminFormElement::text('position', 'Position'),
            AdminFormElement::multiselect('links', 'Button', \App\Models\Link::class)->setDisplay('title'),
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
