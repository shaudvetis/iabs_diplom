<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        //\App\User::class => 'App\Http\Sections\Users',

        \App\CommonSetting::class => '\App\Http\Sections\CommonSettingsSection',
        \App\OperationSkillsCategory::class => '\App\Http\Sections\OperationSkillsCategories',
        \App\PracticeSkillsCategory::class => '\App\Http\Sections\PracticeSkillsCategories',
       \App\Topclasses::class => '\App\Http\Sections\TopclassesSection',
       \App\Page::class => '\App\Http\Sections\PagesSection',
       \App\Memorisplan::class => '\App\Http\Sections\MemorisplanSection',
       \App\Lectures::class => '\App\Http\Sections\LecturesSection',
       \App\ModelSeminar\Seminarus::class => '\App\Http\Sections\Seminarus',
       \App\ModelSeminar\Seminar_Tema::class => '\App\Http\Sections\Seminar_temas',
       \App\ModelSeminar\Napravleniya::class => '\App\Http\Sections\NapravleniyaSection',
       \App\ModelSeminar\KafedraName::class => '\App\Http\Sections\KafedraNameSection',
       \App\ModelSeminar\TeacherName::class => '\App\Http\Sections\TeacherNameSection'
    ];

    /**
     * Register sections.
     *
     * @param \SleepingOwl\Admin\Admin $admin
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);
    }
}
