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


class PagesSection extends Section implements  Initializable
{
   protected $model = '\App\Page';

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
    protected $title = 'Страница студента';

    /**
     * @var string
     */
    protected $alias = 'info-pages';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync()->setColumns([
            AdminColumn::text('id')->setLabel('#'),
            AdminColumn::link('title')->setLabel('Настройка')
        ]);

        $display->paginate(15);
        return $display;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::panel()->addBody([
            //AdminFormElement::text('title', 'Название страницы')->required(),
            AdminFormElement::text('slug', 'URL страницы')->unique()->required(),
            AdminFormElement::text('id', 'ID')->setReadonly(1),
            AdminFormElement::ckeditor('content')->setLabel('Создано'),
            AdminFormElement::text('created_at')->setLabel('Создано')->setReadonly(1)

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

     // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-gear';
    }
}
