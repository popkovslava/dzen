<?php

namespace App\Admin\Http\Sections;

use Gate;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * Class Users
 *
 * @property \App\Models\User $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Users extends  Section implements Initializable
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = true;

    /**
     * @var string
     */
    protected $title="Users";

    /**
     * @var string
     */
    protected $alias="users";


    public function initialize()
    {

        $this->updating(function($config, \Illuminate\Database\Eloquent\Model $model) {
            if(!Auth::user()->hasRole('admin')){
                return false;
            }
       });

        $this->addToNavigation($priority = 200, function () {
            return \App\Models\User::count();
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
                AdminColumn::text('id', '#')->setWidth('30px'),
                AdminColumn::link('label', 'Label')->setWidth('100px'),
                AdminColumn::text('name', 'Name'),
                AdminColumn::text('email', 'Email')
            ])->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::panel()
                ->setHtmlAttribute('enctype', 'multipart/form-data')
                ->addBody([
                    AdminFormElement::text('name', 'Username')->required(),
                    AdminFormElement::password('password', 'Password')->required()->addValidationRule('min:6'),
                    AdminFormElement::text('email', 'E-mail')->required()->addValidationRule('email'),
                    AdminFormElement::multiselect('roles', 'Roles', \App\Models\Role::class)->setDisplay('name')]);
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
