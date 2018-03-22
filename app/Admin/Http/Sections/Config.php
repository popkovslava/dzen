<?php
namespace App\Admin\Http\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;


use App\Http\Controllers\ConfigController;

use App\Http\Requests\ConfigRequest;
use Illuminate\Support\Facades\Redirect;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;
use Illuminate\Http\Request;

/**
 * Class Config
 *
 * @property \App\Models\Config $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Config extends Section implements Initializable
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
    protected $title = "Configs";

    /**
     * @var string
     */
    protected $alias = "configs";

    public function initialize()
    {
        app()->booted(function () {
            \AdminNavigation::getPages()->findById('config-section')->addPage(
                $this->makePage(
                    908,
                    function () {
                        return \App\Models\Config::count();
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
                AdminColumn::text('title', 'Title'),
                AdminColumn::text('link.title', 'Link')->setWidth('500px'),
                AdminColumn::relatedLink('keyConfig.title', 'Key Config')->setWidth('300px'),
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
            AdminFormElement::select('link_id', 'Links', \App\Models\Link::class)->setDisplay('title'),
            AdminFormElement::select('key_config_id', 'Key Configs', \App\Models\KeyConfig::class)->setDisplay('title')->unique()
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
