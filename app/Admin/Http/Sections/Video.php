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
 * Class Video
 *
 * @property \App\Models\Video $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Video extends Section implements Initializable
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

    /**
     * @var string
     */
    protected $title="Videos";

    /**
     * @var string
     */
    protected $alias='videos';

    public function initialize()
    {
        app()->booted(function () {
            \AdminNavigation::getPages()->findById('video-section')->addPage(
                $this->makePage(
                    1,
                    function () {
                        return \App\Models\Video::count();
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
                AdminColumn::text('title', 'Title'),
                AdminColumn::relatedLink('videoCategory.title', 'Video Category'),
                AdminColumn::image('image', 'Image')->setWidth('300px')->setImageWidth('150px'),
                AdminColumn::custom('Published', function (\App\Models\Video $model) {
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
            AdminFormElement::select('video_category_id', 'Video Category', \App\Models\VideoCategory::class)
                ->setDisplay('title')->required(),
            AdminFormElement::text('title', 'Title')->required(),
            AdminFormElement::cropimage('image', 'Image', [
                'cropOptions' => [
                    'aspectRatio' => 2/1
                ],
                ])->required()
                ->setUploadPath(function (\Illuminate\Http\UploadedFile $file) {
                    return 'files/temp';
                }),
            AdminFormElement::text('description', 'Description'),
            AdminFormElement::text('url', 'Code Video')->required(),
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
