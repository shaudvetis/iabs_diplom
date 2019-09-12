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

        \App\OperationSkill::class => '\App\Http\Sections\OperationSkill',
        \App\PracticeSkill::class => '\App\Http\Sections\PracticeSkills',

        \App\Inputforms::class => '\App\Http\Sections\InputformsSection',

        \App\Topclasses::class => '\App\Http\Sections\TopclassesSection',

        \App\Page::class => '\App\Http\Sections\PagesSection',

        \App\Memorisplan::class => '\App\Http\Sections\MemorisplanSection',

       

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
