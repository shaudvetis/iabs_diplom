<?php

namespace App\Http\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Initializable;

/**
 * Class CommonSettingsSection
 *
 * @property \App\CommonSetting $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class InputformsSection extends Section implements Initializable
{

    protected $model = '\App\CommonSetting';

    /**
     * Initialize class.
     */
    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500);

        $this->creating(function($config, \Illuminate\Database\Eloquent\Model $model) {
            //...
        });
    }

    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = 'Настройки формы';

    /**
     * @var string
     */
    protected $alias = 'diagnoses';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()/*->with('users')*/
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                AdminColumn::text('id', '#')->setWidth('30px'),
                AdminColumn::link('diagnoses', 'Курація хворих (діагноз)')->setWidth('200px'),
                AdminColumn::link('num_card', '№ карти стац. хворого')->setWidth('200px'),
                AdminColumn::link('apdate', 'Дати спостереження (початок та кінець курації)
')->setWidth('200px'),
            )->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('diagnoses', 'Название настройки')->required(),
            AdminFormElement::ckeditor('num_card', 'Значение')->required(),
            AdminFormElement::text('id', 'ID')->setReadonly(1),
            AdminFormElement::text('apdate', 'Дати спостереження (початок та кінець курації)')->required(),
            AdminFormElement::text('created_at')->setLabel('Создано')->setReadonly(1),

        ]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('diagnoses', 'Название настройки')->required(),
            AdminFormElement::ckeditor('num_card', 'Значение')->required(),
             AdminFormElement::text('apdate', 'Дати спостереження (початок та кінець курації)')->required(),
        ]);
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

    //заголовок для создания записи
    public function getCreateTitle()
    {
        return 'Создание общей информации';
    }

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-gear';
    }
}
