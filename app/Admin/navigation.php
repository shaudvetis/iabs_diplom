<?php

use SleepingOwl\Admin\Navigation\Page;


$navigation = app('sleeping_owl.navigation');

$navigation->setFromArray([
    
  
 [
        'title' => 'Skills',
        'icon' => 'fa fa-group',
        'priority' =>'10000',
        'pages' => [
            //(new Page(\App\PracticeSkillsCategory::class))
            //    ->setIcon('fa fa-user')
            //    ->setPriority(0),
            (new Page(\App\OperationSkillsCategory::class))
                ->setIcon('fa fa-user')
                ->setPriority(0),
            //(new Page(\App\PracticeSkills::class))
            //    ->setIcon('fa fa-pencil')
            //    ->setPriority(0),
            (new Page(\App\OperationSkill::class))
                ->setIcon('fa fa-pencil')
                ->setPriority(0)
          
        ]
    ]

]);





















































//return [
//   [
//     'title' => 'OperationSkillsCategories',
 //      'icon'  => 'fa fa-dashboard',
 //       'url'   => route('admin.operationskillscategories'),
 //   ]

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });
//
// AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\User::class);
// });
//
// // or
//
// AdminSection::addMenuPage(\App\User::class)

//return [
  //  [
    //    'title' => 'Dashboard',
      //  'icon'  => 'fa fa-dashboard',
        //'url'   => route('admin.dashboard'),
    //],

    //[
      //  'title' => 'Information',
        //'icon'  => 'fa fa-exclamation-circle',
        //'url'   => route('admin.information'),
    //],

    // Examples
    // [
    //    'title' => 'Content',
    //    'pages' => [
    //
    //        \App\User::class,
    //
    //        // or
    //
    //        (new Page(\App\User::class))
    //            ->setPriority(100)
    //            ->setIcon('fa fa-user')
    //            ->setUrl('users')
    //            ->setAccessLogic(function (Page $page) {
    //                return auth()->user()->isSuperAdmin();
    //            }),
    //
    //        // or
    //
    //        new Page([
    //            'title'    => 'News',
    //            'priority' => 200,
    //            'model'    => \App\News::class
    //        ]),
    //
    //        // or
    //        (new Page(/* ... */))->setPages(function (Page $page) {
    //            $page->addPage([
    //                'title'    => 'Blog',
    //                'priority' => 100,
    //                'model'    => \App\Blog::class
	//		      ));
    //
	//		      $page->addPage(\App\Blog::class);
    //	      }),
    //
    //        // or
    //
    //        [
    //            'title'       => 'News',
    //            'priority'    => 300,
    //            'accessLogic' => function ($page) {
    //                return $page->isActive();
    //		      },
    //            'pages'       => [
    //
    //                // ...
    //
    //            ]
    //        ]
    //    ]
    // ]
//];