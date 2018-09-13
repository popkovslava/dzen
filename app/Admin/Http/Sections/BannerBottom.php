<?php
namespace App\Admin\Http\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;

/**
 * Class BannerBottom
 *
 * @property \App\Models\BannerBottom $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class BannerBottom extends Section implements Initializable
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
    protected $title = "Banner Bottom";

    /**
     * @var string
     */
    protected $alias = "banner_bottom";

    public function initialize()
    {
        app()->booted(function () {
            \AdminNavigation::getPages()->findById('elements')->addPage(
                $this->makePage(
                    908,
                    function () {
                        return \App\Models\BannerBottom::count();
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
            ->setColumns([
                AdminColumn::text('id', 'Id'),
                AdminColumn::text('title', 'Title')->setWidth('200px'),
                AdminColumn::text('description', 'description'),
                AdminColumn::relatedLink('page.title', 'Page')->setWidth('200px'),
            ])->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('title', 'Title')->required(),
            AdminFormElement::select('gallery_id', 'Gallery', \App\Models\Gallery::class)->setDisplay('title'),
            AdminFormElement::text('description', 'Description')->required(),
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
