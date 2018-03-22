<?php

namespace App\Admin\Http\Sections;

use Meta;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

/**
 * Class Users
 *
 * @property \App\Model\User $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Users extends Section implements Initializable
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
    protected $title = "Users";

    /**
     * @var string
     */
    protected $alias = "users";

    public function initialize()
    {
        app()->booted(function () {
            \AdminNavigation::getPages()->findById('users-section')->addPage(
                $this->makePage(
                    1001,
                    function () {
                        return \App\Models\User::count();
                    }
                )
            );
        });
    }


    public function onDisplay()
    {
        return AdminDisplay::table()
            ->with('roles')
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns([
                AdminColumn::link('name', 'Username'),
                AdminColumn::email('email', 'Email')->setWidth('400px'),
                AdminColumn::lists('roles.label', 'Roles')->setWidth('600px'),
                AdminColumn::text('phone', 'Phone')->setWidth('400px'),
                AdminColumn::text('time_start', 'Start Time')->setWidth('400px'),
                AdminColumn::text('time_stop', 'End Time')->setWidth('400px'),

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

        return AdminForm::panel()
        ->setHtmlAttribute('enctype', 'multipart/form-data')
        ->addBody([
            AdminFormElement::text('name', 'Username')->required(),
            AdminFormElement::password('password', 'Password')->required()->addValidationRule('min:6'),
            AdminFormElement::text('email', 'E-mail')->required()->addValidationRule('email'),
            AdminFormElement::text('phone', 'Phone')->unique(),
            AdminFormElement::multiselect('roles', 'Roles', \App\Models\Role::class)->setDisplay('name'),
            AdminFormElement::cropimage('avatar', 'Image', [
                'cropOptions' => [
                    'aspectRatio' => 1/1
                ],
            ])
            ->setUploadPath(function (\Illuminate\Http\UploadedFile $file) {
                return 'files/temp';
            }),
            AdminFormElement::select(
                'time_start',
                'Start Time',
                [
                    '0'=>'00',
                    '1'=>'01',
                    '2'=>'02',
                    '3'=>'03',
                    '4'=>'04',
                    '5'=>'05',
                    '6'=>'06',
                    '7'=>'07',
                    '8'=>'08',
                    '9'=>'09',
                    '10'=>'10',
                    '11'=>'11',
                    '12'=>'12',
                    '13'=>'13',
                    '14'=>'14',
                    '15'=>'15',
                    '16'=>'16',
                    '17'=>'17',
                    '18'=>'18',
                    '19'=>'19',
                    '20'=>'20',
                    '21'=>'21',
                    '22'=>'22',
                    '23'=>'23'
                ]
            ),
            AdminFormElement::select(
                'time_stop',
                'End Time',
                [
                    '0'=>'00',
                    '1'=>'01',
                    '2'=>'02',
                    '3'=>'03',
                    '4'=>'04',
                    '5'=>'05',
                    '6'=>'06',
                    '7'=>'07',
                    '8'=>'08',
                    '9'=>'09',
                    '10'=>'10',
                    '11'=>'11',
                    '12'=>'12',
                    '13'=>'13',
                    '14'=>'14',
                    '15'=>'15',
                    '16'=>'16',
                    '17'=>'17',
                    '18'=>'18',
                    '19'=>'19',
                    '20'=>'20',
                    '21'=>'21',
                    '22'=>'22',
                    '23'=>'23'
                ]
            ),
            AdminFormElement::text('created_at')->setLabel('Created')->setReadonly(1)
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
